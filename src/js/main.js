import Tooltip from "bootstrap/js/dist/tooltip";
var tooltipTriggerList = [].slice.call(
  document.querySelectorAll('[data-toggle="tooltip"]')
);
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new Tooltip(tooltipTriggerEl, { placement: "top" });
});
console.log(tooltipList);
