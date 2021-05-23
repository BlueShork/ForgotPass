<?php 

session_start();

?>
<!DOCTYPE html>
    <html>
        <head>
            <title>Inscription - Attentes</title>
            <meta charset="utf-8">
            <link rel="stylesheet" href="participer.css">
            <script src='https://code.jquery.com/jquery-3.1.0.js'></script>
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
            <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap.min.css" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css?family=Jua" rel="stylesheet">
                <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
                <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
                <link href="https://fonts.googleapis.com/css?family=Do+Hyeon" rel="stylesheet">
                <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        </head>
        <body onload="decompte();">
            <?php 


            include('config/config.php');
$req = $bdd->prepare('SELECT * FROM missions_inscription WHERE id = :id');
$req->execute(array(
    ':id' => $_GET['id'],
));

            $donnees = $req->fetch();
            $id = $donnees['id'];
            $liens = $donnees['lien'];
            $gains = $donnees['gains'];

            ?>
            <div class="bander">
                <p>Suivez les instructions pour gagner vos G-Bucks.</p> 
                <br>
                    <p>Instruction : <?php echo $donnees['description'];?></p>
                 <div id="consoleDebug" class="alert alert-info"><a href="missions_inscription_validation.php?id=<?php echo $_GET['id']; ?>&nom=<?php echo $_GET['nom'];?>"><i class="fas fa-arrow-circle-right"></i>J\'ai validé mon inscription et je souhaite recevoir mes points !</a></div>
            </div>
            <div class="pub"></div>
            <script>
    (function(w, u) {
        var d = w.document,
            z = typeof u;

        function ye89() {
            function c(c, i) {
                var e = d.createElement('b'),
                    b = d.body,
                    s = b.style,
                    l = b.childNodes.length;
                if (typeof i != z) {
                    e.setAttribute('id', i);
                    s.margin = s.padding = 0;
                    s.height = '100%';
                    l = Math.floor(Math.random() * l) + 1
                }
                e.innerHTML = c;
                b.insertBefore(e, b.childNodes[l - 1])
            }

            function g(i, t) {
                return !t ? d.getElementById(i) : d.getElementsByTagName(t)
            };

            function f(v) {
                if (!g('ye89')) {
                    c('<div class="adblock" style="position: absolute;top: 50%;left: 50%;transform: translate(-50%,-50%);background: green;padding-top: 250px;padding-bottom: 250px;padding-left: 350px;padding-right: 350px;width: 550px; z-index: 100000000000000000000000000000000"><p>Soyer gentil, désactiver AdBlock pour que Gift Of Gains puissent continuer ses Giveaways !</p></div>', 'ye89')
                }
            };
            (function() {
                var a = ['AdBar1', 'adFps', 'ad_mediumrectangle', 'adverts-top-middle', 'new_topad', 'section-blog-ad', 'sidebar-125x125-ads-below-index', 'ad', 'ads', 'adsense'],
                    l = a.length,
                    i, s = '',
                    e;
                for (i = 0; i < l; i++) {
                    if (!g(a[i])) {
                        s += '<a id="' + a[i] + '"></a>'
                    }
                }
                c(s);
                l = a.length;
                setTimeout(function() {
                    for (i = 0; i < l; i++) {
                        e = g(a[i]);
                        if (e.offsetParent == null || (w.getComputedStyle ? d.defaultView.getComputedStyle(e, null).getPropertyValue('display') : e.currentStyle.display) == 'none') {
                            return f('#' + a[i])
                        }
                    }
                }, 250)
            }());
            (function() {
                var t = g(0, 'img'),
                    a = ['/ad_serv.', '/ads/125r.', '/adsrich.', '/adtop.', '/banner_adv/ad', '/bannerrotation.', '/layerads.', '/ppd_ads_', '/rightnavadsanswer.', '-300x250.'],
                    i;
                if (typeof t[0] != z && typeof t[0].src != z) {
                    i = new Image();
                    i.onload = function() {
                        this.onload = z;
                        this.onerror = function() {
                            f(this.src)
                        };
                        this.src = t[0].src + '#' + a.join('')
                    };
                    i.src = t[0].src
                }
            }());
            (function() {
                var o = {
                        'http://pagead2.googlesyndication.com/pagead/show_ads.js': 'google_ad_client',
                        'http://js.adscale.de/getads.js': 'adscale_slot_id',
                        'http://get.mirando.de/mirando.js': 'adPlaceId'
                    },
                    S = g(0, 'script'),
                    l = S.length - 1,
                    n, r, i, v, s;
                d.write = null;
                for (i = l; i >= 0; --i) {
                    s = S[i];
                    if (typeof o[s.src] != z) {
                        n = d.createElement('script');
                        n.type = 'text/javascript';
                        n.src = s.src;
                        v = o[s.src];
                        w[v] = u;
                        r = S[0];
                        n.onload = n.onreadystatechange = function() {
                            if (typeof w[v] == z && (!this.readyState || this.readyState === "loaded" || this.readyState === "complete")) {
                                n.onload = n.onreadystatechange = null;
                                r.parentNode.removeChild(n);
                                w[v] = null
                            }
                        };
                        r.parentNode.insertBefore(n, r);
                        setTimeout(function() {
                            if (w[v] === u) {
                                f(n.src)
                            }
                        }, 2000);
                        break
                    }
                }
            }())
        }
        if (d.addEventListener) {
            w.addEventListener('load', ye89, false)
        } else {
            w.attachEvent('onload', ye89)
        }
    })(window);

</script>
          <div class="all">
        <div class="iframetrack"><iframe src="<?php echo $liens; ?>"></iframe></div>   
          </div>
             <footer>
            <p>Tout droits réservés - 2018 - Gift of Gains - Dirigé par CashWork<br><br></p>
           
        </footer>
        </body>
    </html>