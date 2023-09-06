<style>

section {
    top: 100%;
    right: 0;
    left: 0;
    transition-delay: 0.5s;
    background-color: var(--primary-color);
}

section img {
    object-fit: contain;
}

section video {
    object-fit: cover;
}

</style>

<?php

$videoExtensions = ['mp4', 'webm', 'ogg'];

function sortByDigits($array) {
    usort($array, function($a, $b) {
        // Extract filenames without extensions
        $filenameA = pathinfo($a, PATHINFO_FILENAME);
        $filenameB = pathinfo($b, PATHINFO_FILENAME);

        // Use intval to convert the extracted filenames to integers
        return intval($filenameA) - intval($filenameB);
    });
    return $array;
}

function checkFileExtension($fileName, $allowedExtensions) {
    $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);  // Get the file extension from the filename
    $fileExtension = strtolower($fileExtension);  // Convert to lowercase for case-insensitive comparison
    return in_array($fileExtension, $allowedExtensions);  // Check if the file extension is in the list of allowed extensions
}

$path = 'assets/slides';
$files = array_diff(scandir($path), array('.', '..'));
$files = sortByDigits($files);

$count = '1' . '/' . count($files);
include('components/counter.php');

for ($i=0; $i<count($files); $i++) {
    $source = 'assets/slides/' . $files[$i];
    if (checkFileExtension($files[$i], $videoExtensions)) {
        include('components/animation.php');
    } else {
        include('components/slide.php');
    }
}

?>