let isInternalNavigation = false;
let totalInvisibleTime = parseInt(sessionStorage.getItem('totalInvisibleTime')) || 0;
let lastVisibilityChangeTime = new Date().getTime();

if (!sessionStorage.getItem('startTime')) {
    sessionStorage.setItem('startTime', JSON.stringify(new Date().getTime()));
}

function updateInvisibleTime() {
    const currentTime = new Date().getTime();
    if (document.visibilityState === 'hidden') {
        // Page becomes hidden
        lastVisibilityChangeTime = currentTime;
    } else if (document.visibilityState === 'visible') {
        // Page becomes visible again
        totalInvisibleTime += (currentTime - lastVisibilityChangeTime);
        sessionStorage.setItem('totalInvisibleTime', totalInvisibleTime);
    }
}

document.addEventListener('visibilitychange', updateInvisibleTime);

(function (history) {
    const pushState = history.pushState;
    const replaceState = history.replaceState;
    history.pushState = function (state) {
        isInternalNavigation = true;
        return pushState.apply(history, arguments);
    };

    history.replaceState = function (state) {
        isInternalNavigation = true;
        return replaceState.apply(history, arguments);
    };

    window.addEventListener('popstate', function (event) {
        isInternalNavigation = true;
    });

    document.addEventListener('click', function (event) {
        if (event.target.tagName === 'A' && event.target.href) {
            isInternalNavigation = true;
        }

    });
    window.addEventListener('beforeunload', function () {
        if (!isInternalNavigation) {
            // updateInvisibleTime()
            let startTime = sessionStorage.getItem('startTime');
            let endTime = new Date().getTime();
            const browsingTime = (endTime - startTime);
            const effectiveBrowsingTime = (browsingTime - totalInvisibleTime) / 1000;
            const data = {
                browsingTime: Number.parseInt(effectiveBrowsingTime),
            };
            const blob = new Blob([JSON.stringify(data)], {type: 'application/json'});
            navigator.sendBeacon('/log-browsing-time', blob);
            sessionStorage.removeItem('startTime');
            sessionStorage.removeItem('totalInvisibleTime');
        }
        isInternalNavigation = false;
    });
})(window.history);
