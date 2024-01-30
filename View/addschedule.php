<?php
ob_start();
?>
    
            <form action="/index.php?action=storeschedule" method="post">
                    <label for="exampleInputEmail2" class="form-label mb-0">ID:</label>
                    <input  class="form-control border-0"  name="id" required>
                    <br>
                    <label class="form-label mb-0">Date:</label>
                    <input  class="form-control border-0" type="datetime-local" id="datetime" name="date" required>
                    <br>
                    <label class="form-label mb-0">Departure:</label>
                    <input  class="form-control border-0" type="datetime-local" id="datetime" name="departuretime" required>
                    <br>
                    <label class="form-label mb-0">Arrival:</label>
                    <input  class="form-control border-0" type="datetime-local" id="datetime" name="arrivaltime" required>
                    <br>
                    <label for="exampleInputEmail2" class="form-label mb-0">Seats:</label>
                    <input  class="form-control border-0"  name="availableseats" required>
                    <br>
                    <label for="exampleInputEmail2" class="form-label mb-0">Price:</label>
                    <input  class="form-control border-0"  name="price" required>
                    <br>
                    <label for="exampleInputEmail2" class="form-label mb-0">Number:</label>
                    <input  class="form-control border-0"  name="busnumber" required>
                    <br>
                    <label for="exampleInputEmail2" class="form-label mb-0">Start:</label>
                    <input  class="form-control border-0"  name="startcity" required>
                    <br>
                    <label for="exampleInputEmail2" class="form-label mb-0">End:</label>
                    <input  class="form-control border-0"  name="endcity" required>
                    <br>
                    <input class="btn btn-warning" type="submit" value="Submit" name="add">
            </form>

<?php $content = ob_get_clean(); ?>
<?php include_once 'layout.php';?>