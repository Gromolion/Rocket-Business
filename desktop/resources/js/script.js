let tabIndex = 1;
showTabs(tabIndex);

function plusTab() {
    showTabs(tabIndex += 1);
}

function minusTab() {
    showTabs(tabIndex -= 1);
}

function showTabs(n) {
    let i;
    const tabs = document.getElementsByClassName("check-up");
    let current = document.getElementById('currentTab');
    if (n > tabs.length) {
        tabIndex = 1
    }
    if (n < 1) {
        tabIndex = tabs.length
    }
    for (i = 0; i < tabs.length; i++) {
        tabs[i].style.display = "none";
    }

    tabs[tabIndex - 1].style.display = "block";

    current.textContent = tabIndex;
}