<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>فرق التوقيت بين المدن</title>
</head>
<body>

    <h2>احسب فرق التوقيت بين مدينتين</h2>
    <form method="post">
        <label for="city1">اختر المدينة الأولى:</label>
        <select name="city1" required>
            <option value="Africa/Cairo">القاهرة</option>
            <option value="America/New_York">نيويورك</option>
            <option value="Asia/Tokyo">طوكيو</option>
            <option value="Europe/London">لندن</option>
        </select>

        <br><br>

        <label for="city2">اختر المدينة الثانية:</label>
        <select name="city2" required>
            <option value="Africa/Cairo">القاهرة</option>
            <option value="America/New_York">نيويورك</option>
            <option value="Asia/Tokyo">طوكيو</option>
            <option value="Europe/London">لندن</option>
        </select>

        <br><br>
        <button type="submit">احسب الفرق</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $city1 = $_POST["city1"];
        $city2 = $_POST["city2"];

        // ضبط التوقيت لكل مدينة
        $time1 = new DateTime("now", new DateTimeZone($city1));
        $time2 = new DateTime("now", new DateTimeZone($city2));

        // تحويل توقيت كل مدينة إلى GMT
        $offset1 = $time1->getOffset() / 3600; // تحويل الثواني إلى ساعات
        $offset2 = $time2->getOffset() / 3600;

        // حساب الفرق بين التوقيتين
        $diff = abs($offset1 - $offset2); // الفارق بالساعات

        echo "<h3>الفرق بين $city1 و $city2:</h3>";
        echo "عدد الساعات: " . $diff . " ساعة<br>";
    }
    ?>

</body>
</html>

