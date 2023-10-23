let sideMenu = document.querySelectorAll(".nav__link");
sideMenu.forEach((item) => {
  let li = item.parentElement;

  item.addEventListener("click", () => {
    sideMenu.forEach((link) => {
      link.parentElement.classList.remove("active");
    });

    li.classList.add("active");
  });
});


// Function to update the notification count
function updateNotificationCount() {
  var notificationCount = document.getElementById("notificationPopup").getElementsByTagName("div").length;
  var displayCount = Math.min(notificationCount, 9);
  var countText = notificationCount <= 9 ? displayCount.toString() : "9+";
  document.getElementById("notificationCount").innerText = countText;
}

// Initial update
updateNotificationCount();

// Toggle notificationPopup visibility
function toggleNotificationPopup() {
  var notificationPopup = document.getElementById("notificationPopup");
  notificationPopup.style.display = notificationPopup.style.display === "block" ? "none" : "block";
}

// Click event for notificationButton
document.getElementById("notificationButton").addEventListener("click", function(event) {
  event.stopPropagation();
  toggleNotificationPopup();
});

// Click event anywhere on the page
document.addEventListener("click", function() {
  var notificationPopup = document.getElementById("notificationPopup");
  if (notificationPopup.style.display === "block") {
    notificationPopup.style.display = "none";
  }
});

// Prevent click event from propagating up to the parent elements of notificationPopup
document.getElementById("notificationPopup").addEventListener("click", function(event) {
  event.stopPropagation();
});

// Add notification event
// document.getElementById("addNotification").addEventListener("click", function() {
//   var newDiv = document.createElement("div");
//   newDiv.innerHTML = "<p>asdlkjas</p>";
//   document.getElementById("notificationPopup").appendChild(newDiv);
//   updateNotificationCount();
// });

