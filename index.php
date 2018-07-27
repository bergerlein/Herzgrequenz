<!-- Index mit Eingabeformular --> 

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="css.css">
        <title>index.php</title>
    </head>

    <body>

        <div class ="container">
            <h1> Berechne Deine Herzfrequenzbereiche </h1>

            <form action="result.php" method="post">

                <div class="form-group">
                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                    <div class="container col-sm-4">
                        <input type="text" class="form-control" name="name" placeholder="Name" required>
                    </div>
                </div>

                <div class="form-group slidecontainer">
                    <label for="alter" class="col-sm-2 col-form-label">Alter</label>
                    <div class="container col-sm-2" id="outputAlter"> </div> <!-- zeigt wert des sliders an -->

                    <div class="container"><input type="range" min="18" max="100" value="50" class="slider" id="alter" name="alter">
                    </div>
                </div>

                <fieldset class="form-group">

                    <div class="container">Geschlecht</div>            

                    <input class="form-check-input radio" type="radio"  id="weiblich" name="geschlecht" value="w" checked>
                    <label class="form-check-label" for="geschlecht">
                        weiblich
                    </label>

                    <input class="form-check-input radio" type="radio" id="maennlich" name="geschlecht" value="m">
                    <label class="form-check-label" for="geschlecht">
                        männlich
                    </label>

                </fieldset>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" id="checkArzt" name="checkArzt" required>
                    <label class="form-check-label" for="checkArzt">
                        <small>Ich bin darüber informiert,  dass  eine medizinische Abklärung durch einen Arzt bzw. eine Ärztin vor dem Trainingsbeginn empfohlen wird.
                        </small>
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" id="checkHaftung" name="checkHaftung" required>
                    <label class="form-check-label" for="checkHaftung">
                        <small>Hiermit stimme ich zu, dass die vom System empfohlene Herzfrequenz lediglich eine allgemeine Empfehlung darstellt. Für Folgeschäden, die durch die Umsetzung der empfohlenen Werte entstehen können, wird keine Haftung übernommen. Eine persönliche Beratung vor Trainingsbeginn durch einen Fitnessberater wird dringend angeraten.
                        </small>
                    </label>
                </div>

                <div class="container">
                    <button type="submit" class="btn btn-success">Berechne!</button>
                </div>

            </form> 
        </div>

        <script type='text/javascript'>
            var slider = document.getElementById("alter");
            var output = document.getElementById("outputAlter");
            output.innerHTML = slider.value + ' Jahre'; // Display default slider value

            // Update the current slider value each time the slider handle is draged
            slider.onchange = function () {
                output.innerHTML = this.value + ' Jahre';
            };

        </script>
    </body>

</html>