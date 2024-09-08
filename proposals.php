<?php
// In a real-world scenario, you would fetch proposals from a database
$proposals = [
    ['name' => 'Proposal 1', 'description' => 'Description for Proposal 1'],
    ['name' => 'Proposal 2', 'description' => 'Description for Proposal 2'],
    // Add more proposals as needed
];

foreach ($proposals as $proposal) {
    echo "<div>";
    echo "<p>Name: {$proposal['name']}</p>";
    echo "<p>Description: {$proposal['description']}</p>";
    echo "</div>";
}
?>
