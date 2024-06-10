// search function in index admin
document.getElementById("searchBar").addEventListener("input", function () {
    var searchTerm = this.value.toLowerCase();
    var clients = document.querySelectorAll(".client");
    var hasVisibleClients = false;

    clients.forEach(function (client) {
        var username = client
            .querySelector(".username")
            .textContent.toLowerCase();
        var date = client.querySelector(".date").textContent.toLowerCase();
        var policy = client.querySelector(".policy").textContent.toLowerCase();
        var status = client.querySelector(".status").textContent.toLowerCase();
        if (
            username.includes(searchTerm) ||
            date.includes(searchTerm) ||
            policy.includes(searchTerm) ||
            status.includes(searchTerm)
        ) {
            client.classList.remove("hidden");
            hasVisibleClients = true;
        } else {
            client.classList.add("hidden");
        }
    });

    // document.getElementById('noClientsMessage').classList.toggle('hidden', hasVisibleClients);
    var element = document.getElementById("noClientsMessage");

    if (!hasVisibleClients) {
        element.classList.remove("hidden");
        element.classList.add("flex", "items-center", "justify-center");
    } else {
        element.classList.remove("flex", "items-center", "justify-center");
        element.classList.add("hidden");
    }
});

// logic for modals in index
const expiringModal = document.querySelector("[data-expiring-modal]");
const pendingModal = document.querySelector("[data-pending-modal]");
const approvedModal = document.querySelector("[data-approved-modal]");

document.querySelectorAll("[data-status-btn]").forEach((btn) => {
    btn.addEventListener("click", function () {
        var card = btn.closest(".client");
        var username = card
            .querySelector(".username")
            .textContent.toLowerCase();
        var date = card.querySelector(".date").textContent.toLowerCase();
        var policy = card.querySelector(".policy").textContent.toLowerCase();
        var status = card
            .querySelector(".status")
            .textContent.toLowerCase()
            .replace(/[\n\r]+|[\s]{2,}/g, " ")
            .trim();
        switch (status) {
            case "expiring":
                var uname = (document.getElementById(
                    "expiringUsername"
                ).textContent = username);
                var polic = (document.getElementById(
                    "expiringPolicy"
                ).textContent = policy);
                expiringModal.showModal();
                break;
            case "pending":
                var uname = (document.getElementById("pendingUsername").value =
                    username);
                var polic = (document.getElementById("pendingPolicy").value =
                    policy);
                pendingModal.showModal();
                break;
            case "approved":
                var uname = (document.getElementById(
                    "approvedUsername"
                ).textContent = username);
                var polic = (document.getElementById(
                    "approvedPolicy"
                ).textContent = policy);
                approvedModal.showModal();
                break;

            default:
                break;
        }
    });
});

// closing pending, expring and apporved modals
const closeExpiring = document.querySelector("[data-close-expiring-modal]");
closeExpiring.addEventListener("click", function () {
    expiringModal.close();
});

const closeApproved = document.querySelector("[data-close-approved-modal]");
closeApproved.addEventListener("click", function () {
    approvedModal.close();
});

const closePending = document.querySelector("[data-close-pending-modal]");
closePending.addEventListener("click", function () {
    pendingModal.close();
});

// open files
const filesModal = document.querySelector("[data-check-file-modal]");
const closeModal = document.querySelector("[data-check-file-modal-close]");
document.querySelectorAll("[data-check-file-modal-open]").forEach((btn) => {
    btn.addEventListener("click", function () {
        filesModal.showModal();
    });
});

closeModal.addEventListener("click", function () {
    filesModal.close();
});
