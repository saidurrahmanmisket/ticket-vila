<style>
    /* Style the custom dropdown */
    .custom-dropdown {
        position: relative;
        display: inline-block;
        width: 120px;
        font-family: Arial, sans-serif;
    }

    .dropdown-selected {
        background-color: #ffffff;
        padding: 6px 10px;
        border: 1px solid #ccc;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .dropdown-selected img {
        margin-right: 10px;
    }

    .dropdown-options {
        display: none;
        position: absolute;
        background-color: #ffffff;
        width: 100%;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
        max-height: 150px;
        overflow-y: auto;
    }

    .dropdown-options div {
        padding: 6px 10px;
        cursor: pointer;
        display: flex;
        align-items: center;
    }

    .dropdown-options div:hover {
        background-color: #f1f1f1;
    }

    .dropdown-options div img {
        margin-right: 5px;
    }

    /* Show the dropdown when open */
    .show {
        display: block;
    }

    @media only screen and (min-width: 200px) and (max-width: 479px) {
        .dropdown-selected .lang-text{
            display: none;
        }

        .dropdown-options {
            width: 120px;
        }
        .custom-dropdown {
            width: auto;
        }
    }
</style>
<div class="custom-dropdown">
    <div class="dropdown-selected form-select select">
        <span>
          <img src="https://flagcdn.com/{{locale() === 'en' ? 'us' : locale()}}.svg" alt="{{locale()}}" width="24" />
            <span class="lang-text">{{ucfirst(locale())}}</span>
        </span>
    </div>
    <div class="dropdown-options">
        @foreach(\App\Enums\Lang::map() as $key => $lang)
            <div data-value="{{$key}}">
                <img src="https://flagcdn.com/{{$key=='en' ? 'us' : $key}}.svg" alt="{{$lang}}" width="24" />
                <span class="lang-text">{{ucfirst($key)}}</span>
            </div>
        @endforeach
    </div>
</div>
<script>
    // window.addEventListener('DOMContentLoaded', function () {
        const selected = document.querySelector(".dropdown-selected");
        const optionsContainer = document.querySelector(".dropdown-options");
        const optionsList = document.querySelectorAll(".dropdown-options div");
        const selectElement = document.querySelector("#change_locale");

        selected.addEventListener("click", function () {
            optionsContainer.classList.toggle("show");
        });

        optionsList.forEach((option) => {
            option.addEventListener("click", function () {
                selected.innerHTML = `
                    <span>
                        ${this.innerHTML}
                    </span>
                `;
                var url = '{{ route('setLocale', ':code') }}';
                $.ajax({
                    type: "GET",
                    url: url.replace(':code', this.getAttribute("data-value")),
                    data: {
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function (resp) {
                        window.location.reload()
                    }, // success end
                    error: function (error) {
                        flasher.error(error?.responseJson?.message);
                    } // Error
                })
                optionsContainer.classList.remove("show");
            });
        });

        window.addEventListener("click", function (e) {
            if (
                !selected.contains(e.target) &&
                !optionsContainer.contains(e.target)
            ) {
                optionsContainer.classList.remove("show");
            }
        });
    // })
</script>
