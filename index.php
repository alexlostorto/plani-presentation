<style>

@import url('https://fonts.googleapis.com/css2?family=Itim&display=swap');

* {
    font-family: 'Itim', cursive;
}

:root {
  --primary-color: #ffffff;
  --secondary-color: #fcbad0;
  --tertiary-color: #fcbad0;
  --accent-color: #ff74b3;
  --black: #0e0a1d;
}

::selection {
  background-color: var(--secondary-color);
}

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  color: var(--black);
}

a {
  text-decoration: none;
}

li {
  list-style: none;
}

html,
body {
  height: 100%;
}

body {
  overflow: hidden;
  color: white;
}

.hover {
  background-color: white;
  color: black;
  font-weight: bold;
}

</style>

<?php 

$seo_keywords = 'alexlostorto, Alex, Alex lo Storto, Alex Lo Storto, portfolio, portfolio website, Portfolio Website, Photography, photographer, programmer, coder, web developer, open source, plani, plani-presentation, powerpoint, marketing, work experience';
$seo_description = 'Plani Presentation';
$seo_author = 'Alex lo Storto';
$site_title = 'Plani Presentation';

?>

<?php include('components/header.php'); ?>
<?php include('components/slides.php'); ?>
<?php include('components/footer.php'); ?>
<?php include('scripts/change-slide.php'); ?>
<?php include('components/arrows.php'); ?>
