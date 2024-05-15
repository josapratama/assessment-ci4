<?= $this->extend("homepage/index") ?>

<?= $this->section("content") ?>
    <div class="ml-5">
        <div class="py-4 ">
            <h1>Hubungi Kami :</h1>
            <p>Apakah anda memiliki pertanyaan, saran atau butuh bantuan? Jangan ragu untuk menghubungi kami! Kami selalu siap membantu anda dengan segala yang anda butuhkan.</p>
        </div>
        <div>
            <h3>Cara Menghubungi Kami :</h3>
            <ul>
                <li>Email : Kirimkan email anda ke contact @penilaianmahasiswa.com dan tim kami akan segera meresponnya.</li>
                <li>Formulir Kontak : Isilah formulir dibawah ini dengan pertanyaan atau pesan anda dan kami akan menghubungi anda secepatnya.</li>
            </ul>
        </div>
        <div style="width:500px">
            <form>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Email address :</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Nama Lengkap :</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Pesan :</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
            </form>
        </div>
        <p>Kami Siap Membantu : Kami berkomitmen untuk memberikan dukungan terbaik kepada anda. Jangan ragu untuk menghubungi kami jika ada yang bisa kami bantu!</p>
    </div>


<?= $this->endSection() ?>