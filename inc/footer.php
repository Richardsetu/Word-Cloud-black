<div class="footer">
    <h2>&copy; wordcloud.com 2020</h2>
</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/wordcloud.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<script type="text/javascript">
    <?php if ($title == '') { ?>
        var title = "Word Cloud Generator";
    <?php } else {
    ?>
        var title = "<?php echo $title; ?>";
    <?php } ?>

    <?php if ($tags == '') { ?>
        var text = "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc";
    <?php } else {
    ?>
        var text = "<?php echo $tags; ?>";
    <?php } ?>


    
    var lines = text.split(/[,\. ]+/g),
        data = Highcharts.reduce(lines, function(arr, word) {
            var obj = Highcharts.find(arr, function(obj) {
                return obj.name === word;
            });
            if (obj) {
                obj.weight += 1;
            } else {
                obj = {
                    name: word,
                    weight: 1
                };
                arr.push(obj);
            }
            return arr;
        }, []);
    <?php 
        if($colortype == 'hide-color'){
            ?>
            var insidefontcolor = [<?php echo $txarrcolor; ?>];
            <?php
        }else{
            ?>
            var insidefontcolor = ["#98E983", "#08C290", "#EFBD84", "#E6D157"];
            <?php
        }

        if($titlecustom == 'title-c'){
            ?>
            var titlecolor = "<?php echo $titlec; ?>";
            <?php
        }else{
            ?>
            var titlecolor = "#F1F1F3";
            <?php
        }
    
    ?>
    
    Highcharts.chart('container', {
        
        series: [{
            type: 'wordcloud',
            data: data,
            name: 'Occurrences',
            colors: insidefontcolor,
            style: {
                fontFamily: "<?php echo $font; ?>",
            },
        }],
        chart: {
            style: {
                fontFamily: "Arial",
            },
            backgroundColor: "<?php echo $bdcolor; ?>",

        },
        title: {
            text: title,
            style: {
                fontSize: '22px',
                fontWeight: 'bold',
                color: titlecolor
            }
        },
        exporting: {
            buttons: {
                contextButton: {
                    enabled: false
                }
            }
        },
        credits: {
            enabled: false
        },
        tooltip: {
            enabled: false,
        }
    });

    function exportSPNG() {
        Highcharts.charts[0].exportChart({
            type: 'image/png',
            filename: title + '-wordcloud-small',
            width: 600
        });
    }

    function exportMPNG() {
        Highcharts.charts[0].exportChart({
            type: 'image/png',
            filename: title + '-wordcloud-medium',
            width: 900
        });
    }

    function exportBPNG() {
        Highcharts.charts[0].exportChart({
            type: 'image/png',
            filename: title + '-wordcloud-big',
            width: 1200
        });
    }

    function exportPdf() {
        Highcharts.charts[0].exportChart({
            type: 'application/pdf',
            filename: title + '-wordcloud'
        });
    }

    $(document).ready(function() {
        $("#titledrop").change(function() {
            $(this).find("option:selected").each(function() {
                var optionValue = $(this).attr("value");
                if (optionValue) {
                    $(".title-c").not("." + optionValue).hide();
                    $("." + optionValue).show();
                } else {
                    $(".title-c").hide();
                }
            });
        }).change();
        $("#text-color").change(function() {
            $(this).find("option:selected").each(function() {
                var optionValue = $(this).attr("value");
                if (optionValue) {
                    $(".hide-color").not("." + optionValue).hide();
                    $("." + optionValue).show();
                } else {
                    $(".hide-color").hide();
                }
            });
        }).change();
        $("#Background").change(function() {
            $(this).find("option:selected").each(function() {
                var optionValue = $(this).attr("value");
                if (optionValue) {
                    $(".custom-bg").not("." + optionValue).hide();
                    $("." + optionValue).show();
                } else {
                    $(".custom-bg").hide();
                }
            });
        }).change();


        $("#colornew").click(function() {
            $(".color-area-click").append(colornew);
        });
    });


    // This code for Select Font
    var fonts = ["Open Sans","Roboto Slab",, "Lobster", "Josefin Sans", "Shadows Into Light", "Pacifico", "Amatic SC", "Orbitron", "Rokkitt", "Righteous", "Dancing Script", "Bangers", "Chewy", "Sigmar One", "Architects Daughter", "Abril Fatface", "Covered By Your Grace", "Kaushan Script", "Gloria Hallelujah", "Satisfy", "Lobster Two", "Comfortaa", "Cinzel", "Courgette"];
    var string = "";
    var select = document.getElementById("select")
    for (var a = 0; a < fonts.length; a++) {
        var opt = document.createElement('option');
        opt.value = opt.innerHTML = fonts[a];
        opt.style.fontFamily = fonts[a];
        select.add(opt);
    }

    function fontChange() {
        var x = document.getElementById("select").selectedIndex;
        var y = document.getElementById("select").options;
        document.body.insertAdjacentHTML("beforeend", "<style> #text{ font-family:'" + y[x].text + "';}" +
            "#select{font-family:'" + y[x].text + "';</style>");
        var tl = new TimelineLite,
            mySplitText = new SplitText("#h1", {
                type: "words,chars"
            }),
            chars = mySplitText.chars; //an array of all the divs that wrap each character
        TweenLite.set("#h1", {
            perspective: 400
        });
        tl.staggerFrom(chars, 0.2, {
            opacity: 0,
            scale: 0,
            y: 80,
            rotationX: 180,
            transformOrigin: "0% 50% -50",
            ease: Back.easeOut
        }, 0.01, "+=0");
        var t2 = new TimelineLite,
            mySplitText2 = new SplitText("#h2", {
                type: "words,chars"
            }),
            chars = mySplitText2.chars; //an array of all the divs that wrap each character
        TweenLite.set("#h2", {
            perspective: 400
        });
        t2.staggerFrom(chars, 0.2, {
            opacity: 0,
            scale: 0,
            y: 80,
            rotationX: 180,
            transformOrigin: "0% 100% -50",
            ease: Back.easeOut
        }, 0.01, "+=0");
        var t3 = new TimelineLite,
            mySplitText3 = new SplitText("#h3", {
                type: "words,chars"
            }),
            chars = mySplitText3.chars; //an array of all the divs that wrap each character
        TweenLite.set("#h3", {
            perspective: 400
        });
        t3.staggerFrom(chars, 0.2, {
            opacity: 0,
            scale: 0,
            y: 80,
            rotationX: 180,
            transformOrigin: "0% 150% -50",
            ease: Back.easeOut
        }, 0.01, "+=0");
        var t4 = new TimelineLite,
            mySplitText4 = new SplitText("#h4", {
                type: "words,chars"
            }),
            chars = mySplitText4.chars; //an array of all the divs that wrap each character
        TweenLite.set("#h4", {
            perspective: 400
        });
        t4.staggerFrom(chars, 0.2, {
            opacity: 0,
            scale: 0,
            y: 80,
            rotationX: 180,
            transformOrigin: "0% 200% -50",
            ease: Back.easeOut
        }, 0.01, "+=0");
        var t5 = new TimelineLite,
            mySplitText5 = new SplitText("#standard", {
                type: "words,chars"
            }),
            chars = mySplitText5.chars; //an array of all the divs that wrap each character
        TweenLite.set("#standard", {
            perspective: 400
        });
        t5.staggerFrom(chars, 0.2, {
            opacity: 0,
            scale: 0,
            y: 80,
            rotationX: 180,
            transformOrigin: "0% 250% -50",
            ease: Back.easeOut
        }, 0.01, "+=0");
    }
    TweenLite.to(page, 0, {
        top: "-100vh",
        ease: Bounce.easeOut,
        delay: 0
    });
    TweenLite.to(page, 1, {
        top: "0vh",
        ease: Elastic.easeOut,
        delay: 1
    });
    fontChange();
</script>


</body>

</html>