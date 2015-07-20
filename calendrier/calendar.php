
    <div class="container2">
      <!-- Codrops top bar -->

      <header class="clearfix">
        <h1>Calendrier du PK </h1>
      </header>
      <section class="main">
        <div class="custom-calendar-wrap">
          <div id="custom-inner" class="custom-inner">
            <div class="custom-header clearfix">
              <nav>
                <span id="custom-prev" class="custom-prev"></span>
                <span id="custom-next" class="custom-next"></span>
              </nav>
              <h2 id="custom-month" class="custom-month"></h2>
              <h3 id="custom-year" class="custom-year"></h3>
            </div>
            <div id="calendar" class="fc-calendar-container"></div>
          </div>
        </div>
      </section>
    </div><!-- /container -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.calendario.js"></script>
    <script type="text/javascript" src="js/data.js"></script>
    <script type="text/javascript">  
      $(function() {
      
        var transEndEventNames = {
            'WebkitTransition' : 'webkitTransitionEnd',
            'MozTransition' : 'transitionend',
            'OTransition' : 'oTransitionEnd',
            'msTransition' : 'MSTransitionEnd',
            'transition' : 'transitionend'
          },
          transEndEventName = transEndEventNames[ Modernizr.prefixed( 'transition' ) ],
          $wrapper = $( '#custom-inner' ),
          $calendar = $( '#calendar' ),
          cal = $calendar.calendario( {
            onDayClick : function( $el, $contentEl, dateProperties ) {

              if( $contentEl.length > 0 ) {
                showEvents( $contentEl, dateProperties );
              }

            },
            caldata : codropsEvents,
            displayWeekAbbr : true
          } ),
          $month = $( '#custom-month' ).html( cal.getMonthName() ),
          $year = $( '#custom-year' ).html( cal.getYear() );
          cal.setData( {
                        <?php
                        if (adressIPExist($_SERVER["REMOTE_ADDR"]) == true)
    {
        //majLastVisitWithoutLogin($_SERVER["REMOTE_ADDR"]);
        if ($_SESSION['INSA'] == "OUI")
        {
            majLastVisit($_SESSION["login"]);
        }
        elseif ($_SESSION['INSA'] == "NON")
        {
            majLastVisitUserAmicale($_SESSION["prenom"]." ".$_SESSION["nom"]);
        }
    }
                        global $bdd;
                $reponse = $bdd->query('SELECT (titre), (dateEvent) FROM `event`');
                ?>
                    <?php
                    while ($donnees = $reponse->fetch())
                    {
                     $originalDate = $donnees['dateEvent'];
                     $newDate = date("m-d-Y", strtotime($originalDate));
                        echo "'".addslashes($newDate)."' : '<a href=\"#\">".addslashes($donnees['titre'])."</a>',";
                        //echo '<option value="'.$donnees['name'].'">'.$donnees['name'].'</option>';
                    }
                    ?>
//            '07-01-2014' : '<a href="#">testing</a>',
//            '07-10-2014' : '<a href="#">blabla</a>',
//            '07-10-2014' : '<a href="#">testing 2</a>',
//            '07-07-2014' : '<a href="#">testing</a>'
          } );

        $( '#custom-next' ).on( 'click', function() {
          cal.gotoNextMonth( updateMonthYear );
        } );
        $( '#custom-prev' ).on( 'click', function() {
          cal.gotoPreviousMonth( updateMonthYear );
        } );

        function updateMonthYear() {        
          $month.html( cal.getMonthName() );
          $year.html( cal.getYear() );
        }

        // just an example..
        function showEvents( $contentEl, dateProperties ) {

          hideEvents();
          
          var $events = $( '<div id="custom-content-reveal" class="custom-content-reveal"><h4> Evenement du ' + dateProperties.day + ' ' + dateProperties.monthname  + ', ' + dateProperties.year + '</h4></div>' ),
            $close = $( '<span class="custom-content-close"></span>' ).on( 'click', hideEvents );

          $events.append( $contentEl.html() , $close ).insertAfter( $wrapper );
          
          setTimeout( function() {
            $events.css( 'top', '0%' );
          }, 25 );

        }
        function hideEvents() {

          var $events = $( '#custom-content-reveal' );
          if( $events.length > 0 ) {
            
            $events.css( 'top', '100%' );
            Modernizr.csstransitions ? $events.on( transEndEventName, function() { $( this ).remove(); } ) : $events.remove();

          }

        }
      });
    </script>
  </body>
</html>
