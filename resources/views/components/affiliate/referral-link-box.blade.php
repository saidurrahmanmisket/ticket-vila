@push('style')
    <style>
        .social-icon {
            width: 60px;
            height: 60px;
        }

        @media only screen and (min-width: 200px) and (max-width: 479px) {
            .social-icon {
                width: 40px;
                height: 40px;
            }
        }
    </style>
@endpush
<div class="referral--link--box">
    <h2>Your Referral Link</h2>
    <div class="input--group">
        <input
            type="text"
            placeholder="{{route('referral',auth()->user()->load('affiliate')->affiliate->affiliate_code)}}"
            value="{{route('referral',auth()->user()->load('affiliate')->affiliate->affiliate_code)}}"
            readonly
            disabled
        />
        <!-- copy link  -->
        <div class="copy--link" style="cursor: pointer" onclick="copyUrlToClipboard()">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                width="34"
                height="34"
                viewBox="0 0 34 34"
                fill="none"
            >
                <path
                    d="M15.5859 27.6237H23.6609C23.2419 28.6707 22.5184 29.568 21.5839 30.1994C20.6494 30.8308 19.547 31.1673 18.4192 31.1653H8.50258C7.75837 31.1655 7.02141 31.0191 6.3338 30.7344C5.6462 30.4497 5.02143 30.0323 4.49519 29.5061C3.96895 28.9798 3.55156 28.3551 3.26686 27.6675C2.98216 26.9799 2.83573 26.2429 2.83594 25.4987V14.1653C2.83761 12.7854 3.34189 11.4533 4.25445 10.4182C5.16702 9.38311 6.42539 8.71586 7.79423 8.54124V19.832C7.79423 24.1245 11.2934 27.6237 15.5859 27.6237ZM27.6276 8.85282H30.6309C30.5438 8.72514 30.4441 8.60651 30.3334 8.49868L25.5026 3.66762C25.3983 3.55733 25.2791 3.46212 25.1484 3.38473V6.37368C25.1516 7.03022 25.4138 7.65899 25.878 8.12324C26.3423 8.5875 26.971 8.84969 27.6276 8.85282ZM27.6276 10.9778C26.4072 10.9755 25.2375 10.4896 24.3746 9.6267C23.5116 8.76376 23.0258 7.59405 23.0234 6.37368V2.83203H15.5859C14.8417 2.83182 14.1048 2.97825 13.4171 3.26295C12.7295 3.54765 12.1048 3.96504 11.5785 4.49128C11.0523 5.01752 10.6349 5.64229 10.3502 6.32989C10.0655 7.0175 9.91903 7.75446 9.91923 8.49868V19.832C9.91903 20.5762 10.0655 21.3132 10.3502 22.0008C10.6349 22.6884 11.0523 23.3132 11.5785 23.8394C12.1048 24.3656 12.7296 24.783 13.4172 25.0677C14.1048 25.3524 14.8417 25.4989 15.5859 25.4987H25.5026C26.2468 25.4989 26.9838 25.3524 27.6714 25.0677C28.3589 24.783 28.9837 24.3656 29.51 23.8394C30.0362 23.3132 30.4536 22.6884 30.7383 22.0008C31.023 21.3132 31.1694 20.5762 31.1692 19.832V10.9778H27.6276Z"
                    fill="#868A9B"
                />
            </svg>
        </div>
        <a data-bs-toggle="modal" href="#referral-link-share" role="button" class="share--btn btn--common-affiliate">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="25"
                viewBox="0 0 24 25"
                fill="none"
            >
                <g clip-path="url(#clip0_18664_6480)">
                    <path
                        d="M21.2499 4.49994C21.2499 6.29492 19.7949 7.75006 17.9999 7.75006C16.205 7.75006 14.75 6.29492 14.75 4.49994C14.75 2.70514 16.205 1.25 17.9999 1.25C19.7949 1.25 21.2499 2.70514 21.2499 4.49994Z"
                        fill="white"
                    />
                    <path
                        d="M17.9999 8.50006C15.7939 8.50006 14 6.70602 14 4.49994C14 2.29405 15.7939 0.5 17.9999 0.5C20.206 0.5 21.9999 2.29405 21.9999 4.49994C21.9999 6.70602 20.206 8.50006 17.9999 8.50006ZM17.9999 2C16.621 2 15.5 3.12209 15.5 4.49994C15.5 5.87797 16.621 7.00006 17.9999 7.00006C19.3789 7.00006 20.4999 5.87797 20.4999 4.49994C20.4999 3.12209 19.3789 2 17.9999 2ZM21.2499 20.5001C21.2499 22.2949 19.7949 23.75 17.9999 23.75C16.205 23.75 14.75 22.2949 14.75 20.5001C14.75 18.7051 16.205 17.2499 17.9999 17.2499C19.7949 17.2499 21.2499 18.7051 21.2499 20.5001Z"
                        fill="white"
                    />
                    <path
                        d="M18 24.4999C15.7939 24.4999 14.0001 22.7059 14.0001 20.5C14.0001 18.2939 15.794 16.4999 18 16.4999C20.206 16.4999 21.9999 18.2939 21.9999 20.5C21.9999 22.7059 20.206 24.4999 18 24.4999ZM18 17.9999C16.621 17.9999 15.5001 19.122 15.5001 20.5C15.5001 21.8779 16.621 22.9999 18 22.9999C19.379 22.9999 20.4999 21.8778 20.4999 20.5C20.4999 19.122 19.379 17.9999 18 17.9999ZM7.25006 12.4999C7.25006 14.2949 5.79492 15.7499 3.99994 15.7499C2.20514 15.7499 0.75 14.2949 0.75 12.4999C0.75 10.705 2.20514 9.25 3.99994 9.25C5.79492 9.25 7.25006 10.705 7.25006 12.4999Z"
                        fill="white"
                    />
                    <path
                        d="M3.99994 16.4999C1.79405 16.4999 0 14.706 0 12.4999C0 10.2939 1.79405 8.5 3.99994 8.5C6.20602 8.5 8.00006 10.2939 8.00006 12.4999C8.00006 14.706 6.20602 16.4999 3.99994 16.4999ZM3.99994 10C2.62097 10 1.5 11.1219 1.5 12.4999C1.5 13.878 2.62097 14.9999 3.99994 14.9999C5.37909 14.9999 6.50006 13.878 6.50006 12.4999C6.50006 11.1219 5.37909 10 3.99994 10Z"
                        fill="white"
                    />
                    <path
                        d="M6.36037 12.0198C6.01228 12.0198 5.67426 11.8387 5.49028 11.5148C5.21723 11.0358 5.38533 10.4247 5.86434 10.1507L15.1432 4.86072C15.6222 4.58571 16.2332 4.7538 16.5073 5.23464C16.7804 5.71361 16.6123 6.32467 16.1332 6.59875L6.8542 11.8887C6.70384 11.9747 6.5336 12.0199 6.36037 12.0198ZM15.6383 20.2698C15.4702 20.2698 15.3003 20.2277 15.1443 20.1387L5.86533 14.8488C5.38626 14.5758 5.2184 13.9647 5.4914 13.4846C5.76328 13.0047 6.37528 12.8357 6.85537 13.1107L16.1344 18.4007C16.6134 18.6737 16.7813 19.2847 16.5083 19.7648C16.3234 20.0887 15.9854 20.2698 15.6384 20.2698H15.6383Z"
                        fill="white"
                    />
                </g>
                <defs>
                    <clipPath id="clip0_18664_6480">
                        <rect
                            width="24"
                            height="24"
                            fill="white"
                            transform="translate(0 0.5)"
                        />
                    </clipPath>
                </defs>
            </svg>
            Share
        </a>
    </div>
    <div class="modal fade" id="referral-link-share" aria-hidden="true" aria-labelledby="share-modal"
         tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="share-modal">Share</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Share this link via</p>
                    <div class="d-flex gap-3 mt-3 pb-3">
                        <a href="#" id="share-facebook">
                            <svg xmlns="http://www.w3.org/2000/svg" class="social-icon" viewBox="0 0 83 83"
                                 fill="none">
                                <ellipse cx="41.3899" cy="41.5" rx="40.6282" ry="41.5" fill="#1F77EF"
                                         fill-opacity="0.1"/>
                                <path
                                    d="M38.2279 60.2032V43.7409H32.8047V37.3252H38.2279V32.5938C38.2279 27.1031 41.5108 24.1133 46.3058 24.1133C48.6026 24.1133 50.5766 24.288 51.1519 24.366V30.1042L47.8263 30.1057C45.2186 30.1057 44.7136 31.3715 44.7136 33.2291V37.3252H50.9329L50.1231 43.7409H44.7136V60.2032H38.2279Z"
                                    fill="#1F77EF"/>
                            </svg>
                        </a>
                        <a href="#" id="share-telegram">
                            <svg xmlns="http://www.w3.org/2000/svg" class="social-icon" viewBox="0 0 82 83"
                                 fill="none">
                                <path
                                    d="M81.2563 41.5C81.2563 64.4198 63.0665 83 40.6282 83C18.1899 83 0 64.4198 0 41.5C0 18.5802 18.1899 0 40.6282 0C63.0665 0 81.2563 18.5802 81.2563 41.5Z"
                                    fill="#37BBFE" fill-opacity="0.1"/>
                                <path
                                    d="M52.2824 33.0398C52.4889 31.6806 51.2205 30.6077 50.0343 31.1384L26.4089 41.7069C25.5583 42.0874 25.6205 43.4002 26.5027 43.6864L31.3749 45.2673C32.3048 45.569 33.3117 45.413 34.1237 44.8414L45.1082 37.1092C45.4395 36.876 45.8005 37.3559 45.5175 37.6532L37.6106 45.9591C36.8436 46.7648 36.9959 48.1301 37.9184 48.7195L46.7711 54.3757C47.764 55.0101 49.0413 54.3728 49.2271 53.1504L52.2824 33.0398Z"
                                    fill="url(#paint0_linear_20515_4713)"/>
                                <defs>
                                    <linearGradient id="paint0_linear_20515_4713" x1="39.0547" y1="31" x2="39.0547"
                                                    y2="54.625" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#37BBFE"/>
                                        <stop offset="1" stop-color="#007DBB"/>
                                    </linearGradient>
                                </defs>
                            </svg>
                        </a>
                        <a href="#" id="share-linkedin">
                            <svg xmlns="http://www.w3.org/2000/svg" class="social-icon" viewBox="0 0 83 83"
                                 fill="none">
                                <ellipse cx="41.5969" cy="41.5" rx="40.6282" ry="41.5" fill="#04BAFF"
                                         fill-opacity="0.1"/>
                                <path
                                    d="M27.4844 35.9233H34.2986V54.9583H27.4844V35.9233ZM48.7384 35.8984C43.8782 35.8984 43.0668 38.5645 43.0668 38.5645V35.9233H37.8092V54.9583H43.1247V43.9794C43.1247 42.4228 44.0272 40.3695 46.892 40.3695C49.7568 40.3695 50.0962 43.168 50.0631 43.5075C50.03 43.847 49.9969 54.95 49.9969 54.95H55.6105V41.7439C55.6188 37.4633 52.7458 35.8984 48.7384 35.8984Z"
                                    fill="#04BAFF"/>
                                <path
                                    d="M30.8873 33.304C32.7667 33.304 34.2903 31.7804 34.2903 29.901C34.2903 28.0216 32.7667 26.498 30.8873 26.498C29.0079 26.498 27.4844 28.0216 27.4844 29.901C27.4844 31.7804 29.0079 33.304 30.8873 33.304Z"
                                    fill="#04BAFF"/>
                            </svg>
                        </a>
                        <a href="#" id="share-whatsapp">
                            <svg xmlns="http://www.w3.org/2000/svg" class="social-icon" viewBox="0 0 82 83"
                                 fill="none">
                                <ellipse cx="40.8547" cy="41.5" rx="40.6282" ry="41.5" fill="#39CA81"
                                         fill-opacity="0.1"/>
                                <path
                                    d="M50.5974 44.7009L50.5815 44.8334C46.6973 42.8975 46.291 42.6396 45.7894 43.3921C45.4414 43.9132 44.4275 45.0948 44.122 45.4446C43.8128 45.789 43.5055 45.8155 42.9809 45.5771C42.451 45.3121 40.75 44.7557 38.7364 42.954C37.1679 41.5498 36.1152 39.8276 35.8043 39.2977C35.2867 38.404 36.3695 38.2768 37.3551 36.4115C37.5318 36.0406 37.4417 35.7492 37.311 35.486C37.1785 35.221 36.124 32.6245 35.6824 31.5894C35.2585 30.5579 34.8222 30.6886 34.4954 30.6886C33.478 30.6003 32.7344 30.6144 32.0791 31.2962C29.2282 34.4297 29.9471 37.6621 32.3864 41.0994C37.1803 47.3734 39.7344 48.5286 44.4046 50.1324C45.6657 50.5334 46.8156 50.4769 47.7253 50.3462C48.7392 50.1854 50.8464 49.0726 51.2862 47.8274C51.7366 46.5821 51.7366 45.5488 51.6042 45.3103C51.4735 45.0719 51.1273 44.9394 50.5974 44.7009Z"
                                    fill="#39CA81"/>
                                <path
                                    d="M55.9249 25.5245C42.3436 12.3953 19.8669 21.9176 19.8581 40.4395C19.8581 44.1417 20.8278 47.7521 22.6754 50.9403L19.6797 61.8245L30.8694 58.9065C44.8323 66.4488 62.0647 56.4336 62.0718 40.4501C62.0718 34.8402 59.8815 29.5606 55.8984 25.5934L55.9249 25.5245ZM58.5426 40.3918C58.532 53.8742 43.7319 62.2943 32.0264 55.4127L31.3905 55.0347L24.7667 56.7569L26.5419 50.3186L26.1198 49.6562C18.8354 38.0602 27.2043 22.905 41.0029 22.905C43.3072 22.8992 45.5898 23.3505 47.7185 24.2328C49.8472 25.1151 51.7798 26.4109 53.4044 28.0451C55.0378 29.6587 56.3334 31.5816 57.2156 33.7015C58.0978 35.8213 58.5489 38.0957 58.5426 40.3918Z"
                                    fill="#39CA81"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('script')
    <script>
        function copyUrlToClipboard() {
            var url = "{{route('referral',auth()->user()->load('affiliate')->affiliate->affiliate_code)}}";
            if (navigator.clipboard) {
                navigator.clipboard.writeText(url).then(function () {
                    flasher.success('Referral url copied successfully.')
                }).catch(function (error) {
                    flasher.error('Fail to copy.')
                });
            } else {
                var tempInput = document.createElement('input');
                tempInput.value = url;
                document.body.appendChild(tempInput);
                tempInput.select();
                try {
                    document.execCommand('copy');
                    flasher.success('Referral url copied successfully.')
                } catch (error) {
                    flasher.error('Fail to copy.')
                }
                document.body.removeChild(tempInput);
            }
        }

        const referralLink = "{{route('referral',auth()->user()->load('affiliate')->affiliate->affiliate_code)}}";

        // Deep linking function
        function openWeb(webURL) {
            window.open(webURL, '_blank');
        }
        // Facebook Share
        document.getElementById('share-facebook').addEventListener('click', function () {
            openWeb(`https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(referralLink)}`);
        });

        // Telegram Share
        document.getElementById('share-telegram').addEventListener('click', function () {
            openWeb(`https://t.me/share/url?url=${encodeURIComponent(referralLink)}&text=${encodeURIComponent('Check out this referral link!')}`);
        });

        // LinkedIn Share
        document.getElementById('share-linkedin').addEventListener('click', function () {
            openWeb(`https://www.linkedin.com/sharing/share-offsite/?url=${encodeURIComponent(referralLink)}`);
        });

        // WhatsApp Share
        document.getElementById('share-whatsapp').addEventListener('click', function () {
            openWeb(`https://api.whatsapp.com/send?text=${encodeURIComponent(referralLink)}`);
        });
    </script>
@endpush
