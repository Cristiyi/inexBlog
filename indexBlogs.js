var listElement = "#blog_links";
var inputElement = "#filterinput";

var valueOfFilterInput = "";
jQuery(function() {
  jQuery("#customfilter").show();
  var data = jQuery(listElement).find("li");
  renderList(null, data);
  jQuery(inputElement).on("change keyup paste", function(){
    renderList(jQuery(inputElement).val(),data);
  });
});

function renderList(searchFor,data)
{
  searchFor = (typeof searchFor === 'undefined' || searchFor == '') ? false : searchFor;
  if(typeof data === "undefined")
  {
    return false;
  }
  jQuery(listElement).html("");
  jQuery(listElement).append('<div class="ibm-col-6-2"></div>').find('div').last().append('<ul class="ibm-link-list ibm-light">');
  var added = 0;
  var resultCount = searchCount(searchFor,data);
  if(resultCount > 0)
  {
    data.each(function()
    {
      if(searchFor == false || searchFor == null || jQuery(this).text().toUpperCase().indexOf(searchFor.toUpperCase()) != -1)
      {
        if(added == Math.ceil(resultCount/3))
        {
          jQuery(listElement).append('<div class="ibm-col-6-2"></div>').find('div').last().append('<ul class="ibm-link-list ibm-light">');
          added = 0;
        }
        jQuery(listElement).find('ul').last().append('<li class="ibm-link-description"><a class="ibm-forward-link" href="'+jQuery(this).find("a").last().attr("href")+'">'+jQuery(this).text()+'</a></li>');
        added++;
      }
    });
    jQuery("#noBlogsFoundMessage").hide();
    jQuery("#blog_links").show();
  }
  else
  {
    jQuery("#noBlogsFoundMessage").show();
    jQuery("#blog_links").hide();
  }
}
function searchCount(searchFor,data)
{
  searchFor = (typeof searchFor === 'undefined' || searchFor == '') ? false : searchFor;
  if(typeof data === "undefined")
  {
    return false;
  }
  var count = 0;
  data.each(function()
  {
    if(searchFor == false || searchFor == null || jQuery(this).text().toUpperCase().indexOf(searchFor.toUpperCase()) != -1)
    {
      count++;
    }
  });
  return count;
}