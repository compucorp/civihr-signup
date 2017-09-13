CRM.$(document).ready(function() {
  CRM.$('#signup-hide-button').click(function() {
    CRM.$('#civihr-signup-tab').toggleClass('slide-in-right');
  });

  try{
    Typekit.load({ async: true });
  }catch(e){
    // all is lost
  }
});
