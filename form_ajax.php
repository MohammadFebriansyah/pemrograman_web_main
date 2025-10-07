<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contoh Form dengan PHP dan JQUERY</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h2>Form Contoh</h2>
    <form id="myForm">
        <label for="buah">Pilih Buah : </label>
        <select name="buah" id="buah">
            <option value="apel">Apel</option>
            <option value="pisang">Pisang</option>
            <option value="mangga">Mangga</option>
            <option value="jeruk">Jeruk</option>
        </select>

        <br>

        <label for="">Pilih Warna Favorit :</label><br>
        <input type="checkbox" name="warna[]" id="" value="merah">Merah <br>
        <input type="checkbox" name="warna[]" id="" value="biru">Biru <br>
        <input type="checkbox" name="warna[]" id="" value="hijau">Hijau <br>

        <br>

        <label for="">Pilih Jenis Kelamin</label><br>
        <input type="radio" name="jenis_kelamin" id=""value="laki-laki">Laki-Laki <br>
        <input type="radio" name="jenis_kelamin" id=""value="perempuan">Perempuan <br>

        <br>

        <input type="submit" value="Submit">
    </form>

    <div id="hasil">
        <!-- Hasil akan ditampilkan disini -->
    </div>
   
   <script>
    $(document).ready(function(){
        $("#myForm").submit(function (e) {
            e.preventDefault();//mencegah pengiriman form secara default 

            //mengumpulkan data form
            var formData = $("#myForm").serialize();

            //kirim data ke server PHP
            $.ajax({
                url:"proses_lanjut.php",
                type : "POST",
                data: formData,
                success:function (response) {
                    // Tampilkan hasil dari server di div "hasil"
                    $("#hasil").html(response);
                }
            });
        });
    });
   </script>
</body>
</html>