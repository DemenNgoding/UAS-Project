<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Community</title>
</head>
<body>
    <label for="name"> Name: </label>
    <input type="text" name="community_name"><br><br>
    <label for="description"> Description: </label>
    <input type="description" name="description"><br><br>
    <div class="select-category">
            Category:
            <select name="category">
                <option value="game">Game</option>
                <option value="olahraga">Olahraga</option>
                <option value="pendidikan">Pendidikan</option>
            </select>
    </div><br>
    <div class="select-city">
            City:
            <select name="city">
                <option value="banda-aceh">Banda Aceh</option>
                <option value="medan">Medan</option>
                <option value="binjai">Binjai</option>
                <option value="pekanbaru">Pekanbaru</option>
                <option value="dumai">Dumai</option>
                <option value="jambi">Jambi</option>
                <option value="palembang">Palembang</option>
                <option value="batam">Batam</option>
                <option value="tanjungpinang">Tanjung Pinang</option>
                <option value="pangkalpinang">Pangkal Pinang</option>
                <option value="tanjungpandan">Tanjung Pandan</option>
                <option value="bengkulu">Bengkulu</option>
                <option value="bandar-lampung">Bandar Lampung</option>
                <option value="serang">Serang</option>
                <option value="tangerang">Tangerang</option>
                <option value="tangerang-sel">Tangerang Selatan</option>
                <option value="jakarta">Jakarta</option>
                <option value="bekasi">Bekasi</option>
                <option value="depok">Depok</option>
                <option value="cirebon">Cirebon</option>
                <option value="indramayu">Indramayu</option>
                <option value="bandung">Bandung</option>
                <option value="pekalongan">Pekalongan</option>
                <option value="semarang">Semarang</option>
                <option value="demak">Demak</option>
                <option value="solo">Solo</option>
                <option value="yogyakarta">Yogyakarta</option>
                <option value="sidoarjo">Sidoarjo</option>
                <option value="malang">Malang</option>
                <option value="surabaya">Surabaya</option>
                <option value="denpasar">Denpasar</option>
                <option value="pontianak">Pontianak</option>
                <option value="palangkaraya">Palangkaraya</option>
                <option value="banjarmasin">Banjarmasin</option>
                <option value="banjarbaru">Banjarbaru</option>
                <option value="samarinda">Samarinda</option>
                <option value="balikpapan">Balikpapan</option>
                <option value="tarakan">Tarakan</option>
                <option value="tanjung-selor">Tanjung Selor</option>
                <option value="makassar">Makassar</option>
                <option value="palu">Palu</option>
                <option value="poso">Poso</option>
                <option value="majene">Majene</option>
                <option value="kendari">Kendari</option>
                <option value="gorontalo">Gorontalo</option>
                <option value="manado">Manado</option>
                <option value="ambon">Ambon</option>
                <option value="ternate">Ternate</option>
                <option value="manokwari">Manokwari</option>
                <option value="jayapura">Jayapura</option>
                <option value="timika">Timika</option>
                <option value="sorong">Sorong</option>
                <option value="nabire">Nabire</option>
                <option value="wamena">Wamena</option>
                <option value="merauke">Merauke</option>
                <option value="kupang">Kupang</option>
                <option value="mataram">Mataram</option>
            </select>
        </div><br><br>
    <form action='/addcommunity/save/{community_id}'>
        <input type="submit" value="Submit">
    </form>
</body>
</html>