document.addEventListener("DOMContentLoaded", () => {

  const collapsebtns  = document.querySelectorAll(".accordion-button");
  const perfInputs = document.querySelectorAll('.accordion-body .form-widget-compound [id*="Produit_performances"]');


  collapsebtns.forEach( pref => {
    console.log('culcul');
    pref.remove();
  });

  perfInputs.forEach(perfInput => {
    perfInput.classList.add("perf-form");
  });

  function coucou(){
    console.log(collapsebtns);
    // collapsebtns.forEach( btn => {
    //   btn.classList.add("invisible");
    // });
  }
  coucou();

});
