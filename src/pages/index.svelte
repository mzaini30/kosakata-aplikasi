<script>
  import { acak } from "kumpulan-tools";
  import kosakata from "../kosakata.json";
  import santri from "../santri.json";

  let teksFilter = "";
  let santriSalin = [...santri];

  let listAngka = [];
  for (let x = 1; x <= kosakata.length; x++) {
    listAngka = [...listAngka, x];
  }

  let kosakataApelPagi = acak(listAngka)[0];
  function filterByKeyword(data, keyword) {
    if (!keyword) {
      return data;
    }

    const keywordChars = keyword.toLowerCase().split("");

    return data.filter((item) => {
      const nameChars = item.nama.toLowerCase();
      return keywordChars.every((char) => nameChars.includes(char));
    });
  }
  function filterBiasa(data, keyword) {
    return data.filter((x) =>
      x.nama.toLowerCase().includes(keyword.toLowerCase()),
    );
  }
</script>

<div class="container py-4 space-y-4">
  <div class="flex justify-between items-center">
    <h1 class="">Cek Bahasa</h1>
    <div>
      <a href="#/ujian" class="btn btn-success">Ujian</a>
    </div>
  </div>
  <ul class="list-group">
    <li class="list-group-item text-center active uppercase">
      Kosakata Apel Pagi
    </li>
    <li class="list-group-item">
      <img src="gambar/{kosakataApelPagi}.PNG" class="block mx-auto" alt="" />
    </li>
    <li class="list-group-item text-center">
      {kosakata[kosakataApelPagi - 1]}
    </li>
  </ul>
  <ul class="list-group">
    <li class="list-group-item text-center active uppercase">Cek Santri</li>
    <li class="list-group-item">
      <div class="input-group">
        <span class="input-group-text" id="basic-addon1">Filter</span>
        <input
          oninput={() => (santriSalin = filterBiasa(santri, teksFilter))}
          bind:value={teksFilter}
          type="search"
          placeholder="Masukkan Nama Santri"
          class="form-control"
        />
      </div>
    </li>
    {#each santriSalin as s}
      <li class="list-group-item">
        <a href="#/santri/{s.id}" class="block">
          {s.nama}
        </a>
      </li>
    {/each}
  </ul>
</div>
