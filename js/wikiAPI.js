$(document).ready(function() {
  var articles = $("#articles");
  var searchUrl = "https://en.wikipedia.org/w/api.php";
  var toSearch = "";
  

  var ajaxArticleData = function() {
    $.ajax({
      url: searchUrl,
      dataType: "jsonp",
      data: {
        //main parameters
        action: "query",
        format: "json",

        generator: "search",
        //parameters for generator
        gsrsearch: toSearch,
        gsrnamespace: 0,
        gsrlimit: 1,

        prop: "extracts|pageimages",
        //parameters for extracts
        explaintext: true,
        exintro: true,

        //parameters for pageimages
        piprop: "thumbnail",
        pilimit: "max",
        pithumbsize: 200
      },
      success: function(json) {
        var pages = json.query.pages;
        $.map(pages, function(page) {
          var pageElement = $("#articles");

          //get the article image (if exists)
          if (page.thumbnail)
            $("#plantimage").attr("src", page.thumbnail.source);

          //get the article text
          pageElement.append($("<p>").text(page.extract));

          // pageElement.append($('<hr>'));

          articles.append(pageElement);
        });
      }
    });
  };

  $("#search_btn").click(function() {
    $.ajax({
      url: `http://35.185.57.3/cff/api/data.php`,
      data: { crop: $('#crop').val() },
      type: "POST",
      success: function(data) {
        plant = {
          genus: "",
          species: ""
        };
        plant.genus = data[0].genus;
        plant.species = data[0].species;
        
        var value = plant.genus + "_" + plant.species;
        toSearch = value;
        articles.empty();
        ajaxArticleData();
      },
    });
  });
});
