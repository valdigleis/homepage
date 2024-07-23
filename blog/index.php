<?php

// Caminho para o diretório de posts
$dir = __DIR__;

// Array para armazenar os arquivos
$files = [];
$infos = [];

// Ler o diretório e encontrar arquivos post.html
if (is_dir($dir)) {
  if ($dh = opendir($dir)) {
    while (($file = readdir($dh)) !== false) {
      if (preg_match('/\.html$/', $file)) {
        $files[] = $file;
        $timestamp = filemtime($file);
        $infos[] = date("Y-m-d", $timestamp);
      }
    }
    closedir($dh);
  }
}

// Função para comparar datas de criação de arquivos
function compare_file_dates($a, $b) {
  return filemtime($b) - filemtime($a);
}

// Função para pegar o texto do primeiro h1 da página
function getFirstH1Text($filename) {
  if(file_exists($filename)){
    $content = file_get_contents($filename);
    $pattern = '/<h1 id="my-title">(.*?)<\/h1>/s';
    if (preg_match($pattern, $content, $matches)) {
      return $matches[1];
    }else{
      return "Arquivo encontrado";
    }
  }else{
    return "Não";
  }
}

// Ordenar os arquivos pela data de modificação
usort($files, 'compare_file_dates');

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Basic Page Needs -->
  <meta charset="UTF-8">
  <title>Prof. Valdigleis</title>
  <meta name="description" content="Dk4LL's Homepage">
  <meta name="author" content="Prof. Valdigleis">
  <!-- Mobile Specific Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS -->
  <link rel="stylesheet" href="../libs/Skeleton-2.0.4/css/normalize.css">
  <link rel="stylesheet" href="../libs/Skeleton-2.0.4/css/skeleton.css">
  <link rel="stylesheet" href="../libs/fontawesome-free-6.5.1/css/all.css">
  <link rel="stylesheet" href="../libs/academicons-1.9.4/css/academicons.css">
  <link rel="stylesheet" href="../css/mystyle.css">
  <!-- Scripts -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="../js/utils.js"></script>
  <!-- Favico -->
  <link rel="icon" href="../imgs/icons/favicon.png">
</head>
<body>

  <h1>Prof. Valdigleis S. Costa</h1>

  <div class="container">
    
    <nav class="menu-nav">
      <ul>
        <li>
          Home
        </li>
        <li>
          <a href="../teaching/">Teaching</a>
        </li>
        <li>
          <a href="../publications.html">Publications</a>
        </li>
        <li>
          <a href="../projects/">Projects</a>
        </li>
      </ul>
    </nav>

    <section class="blog">

      <div class="row">
        <div class="seven columns">
          <h4 class="title">Olá pessoALL!!!</h4>
        </div>
        <div class="five columns" id="postupdate">
        </div>
      </div>

      <img src="../imgs/figs/my-icon.jpg" alt="Foto do campo">
      
      <p>
        Gosta de muitas coisas diferentes, aqui você poderá encontrar listas e também textos das coisas que gosto! Em relação aos textos, alguns são já muito antigos, de meados dos anos 2000, e refletem as opiniões que eu tinha na época, e devido a isso, talvez algumas informações estejam desatualizadas, ou mesmo, eu já não tenha mas a mesma opinião. 
      </p>

      <div class="row">
        <div class="twelve columns">
          <h4 class="title">Listas</h4>
        </div>
      </div>
      <ul class="my-lists">
        <li>Lista de Canais do YouTube</li>
        <li>Lista de Páginas e Blogs Pessoais</li>
      </ul>
      
      <div class="row">
        <div class="twelve columns">
          <h4 class="title">Textos</h4>
        </div>
      </div>

      <ul>
        <?php
          $size = count($files);
          for($i = 0; $i < $size; $i++) {
            if($i > 0){
              echo "\n\t\t<li><em class='textsperator'>" . $infos[$i] . "</em> <a href='$files[$i]'>" . getFirstH1Text($files[$i]) . "</a></li>";
            }else {
              echo "<li><em class='textsperator'>" . $infos[$i] . "</em> <a href='$files[$i]'>" . getFirstH1Text($files[$i]) . "</a></li>";
            }
          }
          echo "\n";
        ?>
      </ul>
      
    </section>

    <footer class="linetop">
      <div class="row">
          <div class="nine columns">
            <ul class="copyright">
              <li> <script> document.write(getCopyrightText()); </script> </li>
              <li>Create with <a href="http://neovim.io/" target="_blank">Neovim</a> v0.10.0 on <a href="https://www.gnu.org/" target="_blank">GNU</a>/<a href="https://www.debian.org/" target="_blank">Linux</a></li>
            </ul>
          </div>
          <div class="three columns">
            <ul class="social">
              <li>
                <a href="https://mastodon.social/@dk4ll" target="_blank" title="Mastodon">
                  <i class="fa-brands fa-mastodon"></i>
                </a>
              </li>
              <li>
                <a href="https://www.reddit.com/user/Dk4LL/" target="_blank" title="Reddit">
                  <i class="fa-brands fa-reddit"></i>
                </a>
              </li>
              <li>
                <a href="https://www.instagram.com/valdigleis/" target="_blank" title="Instagram">
                  <i class="fa-brands fa-instagram"></i>
                </a>
              </li>
              <li>
                <a href="https://github.com/valdigleis" target="_blank" title="Github">
                  <i class="fa-brands fa-github"></i>
                </a>
              </li>
              <li>
                <a href="https://discordapp.com/users/435112713870376962" target="_blank" title="Discord">
                  <i class="fa-brands fa-discord"></i>
                </a>
              </li>
            </ul>
          </div>
      </div>
    </footer>

  </div>
 
</body>
</html>

