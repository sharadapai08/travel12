    </main>
    <footer>
        <p>© <?php echo date("Y"); ?> TravelX. All rights reserved.</p>
    </footer>
</body>
</html>
<?php
// Close connection if it was opened
if (isset($conn)) {
    $conn->close();
}
?>