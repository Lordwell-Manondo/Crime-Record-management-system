<html>

<head>
    <script language="javascript">
        <!--
        var image1 = new Image()
        image1.src = "upload/nf.png"
        var image2 = new Image()
        image2.src = "upload/"
        var image3 = new Image()
        image3.src = "upload/"
        var image3 = new Image()
        image3.src = "upload/pango2.jpg"
        //-->
    </script>
</head>

<body>
    <left><img src="upload/5.png" name="slide" class="img-fluid">
        <script>
            <!--
            //variable yang akan menaikan hitungan gambar
            var step = 1

            function slideit() {
                //jika browser tidak mendukung metode dokumen.image maka keluar.
                if (!document.images)
                    return
                document.images.slide.src = eval("image" + step + ".src")
                if (step < 3)
                    step++
                else
                    step = 1
                //memanggil function "slideit()" setiap 3 detik
                setTimeout("slideit()", 3000)
            }
            slideit()
            //-->
        </script>

</body>

</html>