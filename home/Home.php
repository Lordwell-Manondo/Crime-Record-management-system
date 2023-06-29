<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page </title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
    
        <script>
              window.addEventListener('DOMContentLoaded', () => {
            const words = document.querySelectorAll('.word');
            let currentIndex = 0;

            setInterval(() => {
                words[currentIndex].classList.remove('show');

                if (currentIndex === words.length - 1) {
                    words[0].classList.add('show');
                    currentIndex = 0;
                } else {
                    words[currentIndex + 1].classList.add('show');
                    currentIndex++;
                }
            }, 4000);
        });
    </script>

    <style>
         body {
        background-color:white;
         }     
        
        .navbar-nav .nav-link {
            margin-left: 90px;
            margin-right: 60px;
            margin-top: 5px;
            font-size: 20px;
            spacing: 2px;
        }

        h1, h4 {
            text-align: center;
            color: rgb(0, 109, 139);;
        }
        
        main {
            margin-top: 0;
        }

            
        @keyframes moveText {
            0% {
                transform: translateX(100%);
                opacity: 0;
            }
            40%, 60% {
                opacity: 1;
            }
            100% {
                transform: translateX(-100%);
                opacity: 0;
            }
        }

        .moving-text {
            white-space: nowrap;
            animation: moveText 10s linear infinite;
       
        }
        .navbar-toggler {
        margin-left: auto;
      }
  .navbar-toggler-icon {
    background-color: white;
  }

  .navbar-toggler {
    border-color: white;
  }
       
    </style>
</head>
<body>
  
    

                    <!-- Main content -->
<div class="content">
  
  <!-- Header -->
  <header>
      <!-- Header content -->
      <!-- Navbar -->
    <nav class="navbar navbar-expand-lg " style="background-color: rgb(0, 109, 139);">
      <div class="log">
          <img src="policeLog.PNG" style="height: 65px; width: 65px; margin-left: 5px; border-radius: 25px; margin-left: 0px; margin-top: 0px;">
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
              <li class="nav-item dropdown">
                  <a  class="nav-link" style="color: white;" href="#"  id="home" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Home</a>
                 
              </li>
              <li>
                  <a class="nav-link" style="color: white;" href="../news/News.php">News</a>
              </li>
                  <li class="nav-item dropdown">
                  <a  class="nav-link" style="color: white;" href="guidelines.php">Guidelines</a>
                  
                  </li>
                  <li class="nav-item">
                  <a class="nav-link" style="color: white;" href="ReportForm.php">Report incident</a>
                  </li>
                

                  <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <i class="fas fa-user" style="font-size: 30px; width: 60px; background-color: transparent;"></i>
                    </a>
                <!-- submenu for profile -->
                <ul class="dropdown-menu" style="background-color: transparent;">
                    <li><a class="nav-link" style="color: black;" href="../login/Login.php">Login</a></li>            
                </ul>
                </li>
                </li>
                  
                 </ul>
                  </div>
                  </nav>
  </header>
 
  <!-- Page content -->
  <main>
            <h1>CRIME RECORD MANAGEMENT SYSTEM</h1>
            <div class="moving-text">
                <span class="word show">Creating</span>
                <span class="word">a</span>
                <span class="word">Safe</span>
                <span class="word">and</span>
                <span class="word">Secure</span>
                <span class="word">Malawi</span>
            </div>
        </main>
    </div> 
    <div>


    <div class="container" style="width:100%; color: black;">
        <div class="row">
            <div class="col-md-9">
                <a href="#"><?php include 'slide.php'; ?></a>
            </div>
            <div class="col-md-3">
                <a href="#" class="text-decoration-none text-black">
                <a href="../news/News.php">
                    <h3 class="text-justify" style="color: black;"> <strong>THE COMMERCIAL CITY IN SMOKE CLOUD</strong> </h3>
</a>
                    <div class="row">
                        <div class="col-md-6">
                            <p>Today's News (Fri. June,30)</p>
                        </div>
                        <div class="col-md-6">
                            <p class="text-muted float-right">mps.com</p>
                        </div>
                    </div>
                    <a href="../news/News.php">
    <p class="text-justify text-black">Police in Blantyre on Monday, a city ablaze with fervor and business, witnessed and disperseda demonstrations that captivated the attention of its inhabitants. Citizens took to the streets, their voices resounding as they championed their rights and raised their concerns over pressing social issues. In this .....</p>

                </a>
            </div>
        </div>
        
        <div class="col-md-6 mt-4">
                        <strong>NEWS AND EVENTS</strong>
                    </div>
        <div class="row" >
            <div class="col-md-8">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <a href="#" class="text-decoration-none text-body">
                            <img src="upload/nf.PNG" class="img-fluid" alt="" >
                            <div class="row">
                            <a href="../news/News.php">
                            <div class="text-justify text-black "class="col">Northern Region hit by floods, days after Sourther...</div>
                            </div>
                            <div class="row">
                                <div class="col"><small class="float-md-left text-muted">antaranews.com</small></div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="#" class="text-decoration-none text-body">
                            <img src="img/np.JPG" class="img-fluid" alt="">
                            <a href="../news/News.php">
                            <div class="row container text-black">MPS expresses worry over the illegal killing of the innocent Pangoline and put it under....</div>
                            <div class="row container"> <small class="float-md-left text-muted">times360mw.com</small> </div>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    
                        <a href="#" class="text-decoration-none text-black">
                            <img src="img/donation.jfif" class="img-fluid" alt="">
                            <div class="row">
                <a href="../news/News.php">
        <div class="col text-black">ECG donates 2 billion Malawi kwacha to Malawi Police Service..</div>
          </a>
        </div>
                            <div class="row">
                                <div class="col"><small class="float-md-left text-muted">mps.com</small></div>
                            </div>
                        
                    </div>
                    <div class="col-md-6">
                        <a href="#" class="text-decoration-none text-black">
                            <img src="img/ref.jpg" class="img-fluid" alt="">

                            <a href="../news/News.php">
    <div class="row">
        <div class="col text-black">MPS nabbs 120 immigrants in Mzimba district...</div>
    </div>
</a>

                    </div>
                </div>
            </div>
            <div class="border col-md-4">
                <div class="row mx-2">
                    <div class="col-md-6 mt-4">
                        <strong>POPULAR</strong>
                    </div>
                    <div class="col-md-6 mt-4">
                        <small class="float-md-right"> <a class="text-muted" href="#">Lainnya</a> </small>
                    </div>
                </div>
                <div class="row mx-2">
                    <div class="col-md-3 my-2 text-decoration-none"> <a class="text-black" href="#">
                            Semua
                        </a> </div>
                        <div class="col-md-3 my-2">
    <a class="text-black" href="#">
        <a href="../news/News.php" style="color: black;">News</a>
    </a>
</div>

                    <div class="col-md-3 my-2"> <a class="text-black" href="#">
                            Sports
                        </a> </div>
                    <div class="col-md-3 my-2"> <a class="text-black" href="#">
                            Life
                        </a> </div>
                </div>
                <div class="row m-2">
                    <div class="col-md-1">
                        <strong>1</strong>
                    </div>
                    <div class="col-md">
                        <a href="#" class="text-decoration-none text-black">Ngeri! Suami Nia Ramadhani Rekam Detik-detik Orang Diduga Bunuh Diri</a>
                        <br><small class="text-muted float-left">grid.ID</small>
                    </div>
                </div>
                <div class="row m-2">
                    <div class="col-md-1">
                        <strong>2</strong>
                    </div>
                    <div class="col-md">
                        <a href="#" class="text-decoration-none text-black">Kronologi Penemuan Surat Suara yang Sudah Tercoblos di Malaysia</a>
                        <br><small class="text-muted float-left">Okezone.com</small>
                    </div>
                </div>
                <div class="row m-2">
                    <div class="col-md-1">
                        <strong>3</strong>
                    </div>
                    <div class="col-md">
                        <a href="#" class="text-decoration-none text-black">Black Hole Pertama Kali Tertangkap Kamera, Ini 7 Fakta </a>
                        <br><small class="text-muted float-left">IDN Times</small>
                    </div>
                </div>
                <div class="row m-2">
                    <div class="col-md-1">
                        <strong>4</strong>
                    </div>
                    <div class="col-md">
                        <a href="#" class="text-decoration-none text-black">Bela Pelaku Pengeroyokan Audrey, Seorang Netizen Dibanjiri Kecaman</a>
                        <br><small class="text-muted float-left">hai-online.com</small>
                    </div>
                </div>
                <div class="row m-2">
                    <div class="col-md-1">
                        <strong>5</strong>
                    </div>
                    <div class="col-md">
                        <a href="#" class="text-decoration-none text-black">Foto Bocah Ojek Payung Ini Menyimpan Kisah Haru di Baliknya</a>
                        <br><small class="text-muted float-left">Brilio.net</small>
                    </div>
                </div>
                <div class="row m-2">
                    <div class="col-md-1">
                        <strong>6</strong>
                    </div>
                    <div class="col-md">
                        <a href="#" class="text-decoration-none text-black">
                        <br><small class="text-muted float-left">mps.com</small>
                    </div>
                </div>
            </div>

            </div>
            
            <div class="row container mb-3 mt-5">
    <div class="col">
        <strong style="color: black;">TRENDING</strong>
    </div>
</div>

            <div class="col-md-8">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <a href="#" class="text-decoration-none text-black">
                            <img src="img/po.jfif" class="img-fluid" alt="">

                           
                            <a href="../news/News.php">
                                 <div class="row container text-black">Malawi Police Service-YONECO to conduct Sensitization campaign on Drug and Substance...</div>
                            <div class="row container"> <small class="float-md-left text-muted">mps.com</small> </div>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="#" class="text-decoration-none text-body">
                            <img src="upload/sp.jfif" class="img-fluid" alt="">
                            <a href="../news/News.php">
                            <div class="row container" style="color: black;">Odd Mutual to support MPS Football clubs</div>
                            <div class="row container" style="color: black;"> <small class="float-md-left color: black size: bold">mps.com</small> </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Include Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 
</body>
<style>
    body{
        background-color: white;
        color: black;
    }
    .navbar-nav .nav-link {
            margin-left: 90px;
            margin-right: 60px;
            margin-top: 5px;
            font-size: 20px;
            spacing: 2px;
            color: white;
         
    }
         
    @keyframes moveText {
            0% {
                transform: translateX(100%);
                opacity: 0;
            }
            40%, 60% {
                opacity: 1;
            }
            100% {
                transform: translateX(-100%);
                opacity: 0;
            }
        }

        .moving-text {
            white-space: nowrap;
            animation: moveText 10s linear infinite;
            font-size: 30px; 
            color: black;
    
            
        }
        h1, h4 {
            text-align: center;
        }

</style>
<?php include('../home/footer.html');?>
</html>

<?php

// Function to add "Read more" link after 10 words
function addReadMoreLink($text)
{
    $wordLimit = 10;
    $readMoreText = "Read more";
    $readMoreLink = "../news/News.php"; // Update the link to the actual file

    $words = explode(" ", $text);
    if (count($words) > $wordLimit) {
        $visibleWords = array_slice($words, 0, $wordLimit);
        $hiddenWords = array_slice($words, $wordLimit);
        $visibleText = implode(" ", $visibleWords);
        $hiddenText = implode(" ", $hiddenWords);
        $readMore = '<a href="' . $readMoreLink . '">' . $readMoreText . '</a>';
        $output = $visibleText . '... ' . $readMore;
        return $output;
    } else {
        return $text;
    }
}
?>

