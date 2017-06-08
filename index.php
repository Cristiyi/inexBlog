<!DOCTYPE html>

<html lang="en-US">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1" name="viewport">

  <title>IBM Blogs</title>
  <meta content="index,follow" name="robots">
  <meta content="IBM Blog List" name="description">
  <meta content="blogs, list, IBM" name="keywords">
  <meta content="US" name="geo.country">
  <meta content="" name="dcterms.date">
  <meta content="© Copyright IBM Corp. 2016" name="dcterms.rights">
  <script>
     digitalData = {
       page: {
         pageInfo: {
           effectiveDate: '',
           expiryDate: '',
           language: 'en-US',
           publishDate: '',
           publisher: 'IBM Corporation',
           version: 'v18',
           ibm: {
             contentDelivery: 'Hand coded',
             contentProducer: 'Hand coded',
             country: 'US',
             industry: 'ZZ',
             owner: 'Scott Farnsworth/Austin/IBM',
             siteID: '',
             subject: '',
             type: ''
           }
         }
       }
     };
  </script>
  <script src="//1.www.s81c.com/common/stats/ida_stats.js">
  </script>
  <link href="//1.www.s81c.com/common/v18/css/www.css" rel="stylesheet">
  <link href="//1.www.s81c.com/common/v18/css/forms.css" rel="stylesheet">
  <script src="//1.www.s81c.com/common/v18/js/www.js">
  </script>
  <script src="indexBlogs.js" type="text/javascript"></script>
</head>

<body class="ibm-type" id="ibm-com">
  <div class="ibm-landing-page" id="ibm-top">
    <!-- MASTHEAD_BEGIN -->


    <div aria-label="IBM" id="ibm-masthead" role="banner">
      <div id="ibm-mast-options">
        <ul aria-labelledby="ibm-masthead" role="toolbar">
          <li id="ibm-geo" role="presentation">
            <a aria-label="United states selected - Choose a country" href=
            "http://www.ibm.com/planetwide/select/selector.html" role=
            "button">United States</a>
          </li>
        </ul>
      </div>


      <div id="ibm-universal-nav">
        <nav aria-label="IBM" role="navigation">
          <div id="ibm-home">
            <a href="http://www.ibm.com/us/en/">IBM®</a>
          </div>


          <ul aria-label="Site map" id="ibm-menu-links" role="toolbar">
            <li>
              <a href="http://www.ibm.com/sitemap/us/en/">Site map</a>
            </li>
          </ul>
        </nav>


        <div aria-labelledby="ibm-masthead" id="ibm-search-module" role=
        "search">
          <form action="http://www.ibm.com/Search/" id="ibm-search-form"
          method="get" name="ibm-search-form">
            <p><label for="q">IBM</label> <input aria-label="Search" id="q"
            maxlength="100" name="q" placeholder="Search" type="text" value="">
            <input name="v" type="hidden" value="18"> <input name="en" type=
            "hidden" value="utf"> <input name="lang" type="hidden" value="en">
            <input name="cc" type="hidden" value="us"> <input class=
            "ibm-btn-search" id="ibm-search" type="submit" value="Submit"></p>
          </form>
        </div>
      </div>
    </div>
    <!-- MASTHEAD_END -->
    <!-- MAIN PAGE WRAPPER AROUND LEADSPACE, MAIN CONTENT SIDENAV AND RELATED CONTENT -->


    <div id="ibm-content-wrapper">
      <header aria-labelledby="ibm-pagetitle-h1" role="banner">
        <div class="ibm-sitenav-menu-container">
          <div class="ibm-sitenav-menu-name">
            <a href="#">IBM Blogs</a>
          </div>
        </div>
        <!-- LEADSPACE_BEGIN -->


        <div class="ibm-alternate-background" id="ibm-leadspace-head" style=
        "background: url('writing_in_thought.jpg') no-repeat 0 0 / cover #fff;">
        <div id="ibm-leadspace-body">
            <!-- Nav trail -->

            <div class="ibm-columns">
              <div class="ibm-col-1-1 ibm-padding-top-2 ibm-padding-bottom-2">
                <h1 class="ibm-h1 ibm-textcolor-gray-80 ibm-medium ibm-bold" id="ibm-pagetitle-h1">IBM Blogs</h1>
              </div>
            </div>
          </div>
        </div>
        <!-- LEADSPACE_END -->
      </header>


      <main aria-labelledby="ibm-pagetitle-h1" role="main">
        <div id="ibm-pcon">
          <div id="ibm-content">
            <div id="ibm-content-body">
              <div id="ibm-content-main">

                <div class="ibm-columns ibm-padding-bottom-1">
                  <div class="ibm-col-1-1">
                    <h2 class="ibm-textcolor-gray-40 ibm-light">
                    Check out these blogs</h2>
                  </div>
                </div>

                <?php
                $indexFileDirLocation = realpath(dirname(__FILE__));
                $blogsData = json_decode(file_get_contents($indexFileDirLocation . "/blog_data.json"));

                $displayedBlogCount = 0;
                foreach($blogsData as $blogData)
                {
                  if($blogData->data !== false)
                  {
                    $displayedBlogCount++;
                  }
                }

                if($displayedBlogCount > 0)
                {
                  ?>
                  <div id="customfilter" style="display:none" class="ibm-columns ibm-padding-bottom-1">
                    <div class="ibm-col-1-1">
                      <form class="ibm-row-form">
                        <p>
                          <label for="filterinput" class="ibm-textcolor-gray-40 ibm-light">Filter the listing:</label>
                          <span><input id="filterinput" class="ibm-fullwidth" style="max-width:300px" type="text" value=""/></span>
                        </p>
                      </form>
                    </div>
                  </div>
                  <div id="blog_links" class="ibm-columns ibm-padding-bottom-3">
                    <?php
                      echo '<div class="ibm-col-6-2"><ul class="ibm-link-list ibm-light">';
                      $added = 0;
                      foreach($blogsData as $blogData)
                      {
                        if($blogData->data !== false)
                        {
                          if($added == ceil($displayedBlogCount/3))
                          {
                            echo '</ul></div><div class="ibm-col-6-2"><ul class="ibm-link-list ibm-light">';
                          }
                          echo '<li class="ibm-link-description"><a class="ibm-forward-link" href="'.$blogData->data->url.'">'.$blogData->data->name.'</a></li>';
                          $added++;
                        }
                      }
                      echo '</ul></div>';
                    ?>
                  </div>
                  <div style="display:none;" id="noBlogsFoundMessage" class="ibm-columns ibm-padding-bottom-3">
                    <div class="ibm-col-1-1">
                      No blogs were found. Please, try again later.
                    </div>
                  </div>
                  <?php
                }
                else
                {
                  ?>
                  <div id="noBlogsFoundMessage" class="ibm-columns ibm-padding-bottom-3">
                    <div class="ibm-col-1-1">
                      No blogs were found. Please, try again later.
                    </div>
                  </div>
                  <?php
                }
                ?>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>
  <!-- FOOTER_BEGIN -->


  <div id="ibm-footer-module">
  </div>


  <footer aria-label="IBM" role="contentinfo">
    <div id="ibm-footer">
      <ul>
        <li>
          <a href="http://www.ibm.com/contact/us/en/">Contact</a>
        </li>


        <li>
          <a href="http://www.ibm.com/privacy/us/en/">Privacy</a>
        </li>


        <li>
          <a href="http://www.ibm.com/legal/us/en/">Terms of use</a>
        </li>


        <li>
          <a href="http://www.ibm.com/accessibility/us/en/">Accessibility</a>
        </li>
      </ul>
    </div>
  </footer>
  <!-- FOOTER_END -->
</body>
</html>