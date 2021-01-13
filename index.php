<?php
include_once "inc/header.php";
?>
<?php


$title = $tags = $txarrcolor = $font = $bdcolor = $txcolor = $errorfield = $errortext = $bgcustom = $colortype = $titlec = $titlecustom = "";
if(isset($_POST['title']) && isset($_POST['tags']) && isset($_POST['gfont']) && isset($_POST['background']) && isset($_POST['background']) && isset($_POST['bgcustom']) && isset($_POST['titlecolor'])){
    if($_POST['title'] == ''){
        $errorfield = "<p style='color:red'>Title Field Must Not be Empty</p>";
    }else if($_POST['tags'] == ''){
        $errortext = "<p style='color:red'>Text Field Must Not be Empty</p>";
    }else{
        $title = $_POST['title'];
        $tags  = $_POST['tags'];
        $font = $_POST['gfont'];
        $titlecustom = $_POST['titledrop'];
        if($titlecustom == 'title-c'){
            $titlec = $_POST['titlecolor'];
        }
        $bgcustom = $_POST['bgcustom'];
        if($bgcustom == 'custom-bg'){
            $bdcolor = $_POST['background'];
        }else{
            $bdcolor = 'transparent'; 
        }
        $colortype = $_POST['colortype'];
        if($colortype == 'hide-color'){
            $txcolors = $_POST['color'];
            foreach($txcolors as $txcolor){
                $txarrcolor .= "'$txcolor',";
            }
        }
    }
}

            


?>
<div class="content-section">
    <div class="form-section">
        <div class="container">
           
            <form id="contact" action="" method="post">
            <?php echo $errorfield; ?>
                <fieldset>
                    <input placeholder="Title" name="title" type="text" tabindex="1" value="Word Cloud Generator" autofocus>
                </fieldset>
                <?php echo $errortext; ?>
                <fieldset>
                    <textarea name="tags" placeholder="Type your tag or word here like hello, world, Java" tabindex="5">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</textarea>
                </fieldset>
                <h3>Settings</h3>
                <fieldset>
                    <label for="titledrop">Title Color</label>
                    <select id='titledrop' name="titledrop">
                        <option>Default</option>
                        <option value="title-c">Custom</option>
                    </select>
                </fieldset>
                <fieldset class="title-c">
                    <label for="titlecolor">Color</label>
                    <input type="color" name="titlecolor" id="titlecolor" value="#ffffff">
                </fieldset>
                <fieldset>
                    <label for="font">Text Font</label>
                    <select id='select' name="gfont" onChange="return fontChange();">
                    </select>
                </fieldset>
                <fieldset>
                    <label for="Background">Background</label>
                    <select id='Background' name="bgcustom">
                        <option>Transparent</option>
                        <option value="custom-bg">Custom</option>
                    </select>
                </fieldset>
                <fieldset class="custom-bg">
                    <label for="background">Color</label>
                    <input type="color" name="background" id="background" value="#ffffff">
                </fieldset>
                <fieldset>
                    <label for="text-color">Text Color</label>
                    <select name="colortype" id='text-color'>
                        <option value="1">Default</option>
                        <option value="hide-color">Custom</option>
                    </select>
                </fieldset>
                <fieldset class="hide-color">
                    <div class="color-area-click">
                        <script>
                            var colornew;
                            document.write(
                                colornew = '<input type="color" name="color[]" id="color" value="#ffffff">'
                            );
                        </script>

                    </div>
                    <div id="colornew">Add New Color</div>
                </fieldset>
                <fieldset>
                    <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Preview</button>
                </fieldset>
            </form>
        </div>
    </div>
    <div class="cloud-box-section">
        <div class="cloud-box">
            <div class="generate-layout">
                <div class="cloud-layout">
                    <div id="container"></div>
                </div>

            </div>
        </div>
        <div class="export-btn-area" style="margin-top:20px;text-align: center;">

            <button id="download" onclick="exportSPNG()">Small PNG</button>
            <button id="download" onclick="exportMPNG()">Medium PNG</button>
            <button id="download" onclick="exportBPNG()">Big PNG</button>
            <button id="download" onclick="exportPdf()">PDF</button>
        </div>
    </div>
</div>
<?php
include_once "inc/footer.php";

?>