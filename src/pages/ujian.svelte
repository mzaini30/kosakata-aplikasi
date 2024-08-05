<script>
  import { acak } from "kumpulan-tools";
  import kosakata from "../kosakata.json";

  let listAngka = [];
  for (let x = 1; x <= kosakata.length; x++) {
    listAngka = [...listAngka, x];
  }
  listAngka = listAngka.filter((x) => x != 199);

  let angkaDiacak = $state([]);

  function mengacakAngka() {
    angkaDiacak = acak(listAngka);
    // angkaDiacak = listAngka.reverse();
    console.log(angkaDiacak);
  }
  mengacakAngka();
</script>

<table class="table">
  <thead class="sticky top-0 z-[99]">
    <tr>
      <th class="text-center !bg-blue-500 text-white">Soal</th>
      <th class="text-center !bg-blue-500 text-white">Benar</th>
      <th class="text-center !bg-blue-500 text-white">Salah</th>
    </tr>
  </thead>
  <tbody>
    {#each angkaDiacak.slice(0, 10) as x}
      <tr>
        <td>{x}</td>
        <td class="align-middle">
          <img src="gambar/{x + 1}.PNG" class="mx-auto block" alt="" />
          <p class="text-center mb-0">{kosakata[x]}</p>
        </td>
        <td class="align-middle">
          <input type="radio" name="" id="" class="block mx-auto scale-150" />
        </td>
        <td class="align-middle">
          <input type="radio" name="" id="" class="block mx-auto scale-150" />
        </td>
      </tr>
    {/each}
  </tbody>
</table>
<div class="flex justify-between sticky bottom-0 bg-blue-100 p-2 items-center">
  <div class="">
    <button class="btn btn-success" onclick={mengacakAngka}>Acak</button>
  </div>
  <div class="text-xl font-bold">0</div>
</div>
