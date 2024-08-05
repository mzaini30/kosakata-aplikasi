<script>
  import { acak } from "kumpulan-tools";
  import kosakata from "../kosakata.json";
  import { watch } from "runed";

  let listAngka = [];
  for (let x = 1; x <= kosakata.length; x++) {
    listAngka = [...listAngka, x];
  }
  listAngka = listAngka.filter((x) => x != 199);

  let angkaDiacak = $state([]);
  let nilai = $state([]);
  let nilaiTotal = $state(0);

  for (let n = 0; n < 10; n++) {
    watch(
      () => nilai[n],
      () => menjumlahkan(),
    );
  }

  function menjumlahkan() {
    let total = 0;
    for (let x of nilai) {
      if (x == 1 || x == 0) {
        total += +x;
      }
    }
    nilaiTotal = total;
  }

  function mengacakAngka() {
    angkaDiacak = acak(listAngka);
    nilai = [];
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
    {#each angkaDiacak.slice(0, 10) as x, n}
      <tr>
        <td class="align-middle">
          <img src="gambar/{x + 1}.PNG" class="mx-auto block" alt="" />
          <p class="text-center mb-0">{kosakata[x]}</p>
        </td>
        <td class="align-middle">
          <input
            type="radio"
            value={1}
            name=""
            id=""
            class="block mx-auto scale-150"
            bind:group={nilai[n]}
          />
        </td>
        <td class="align-middle">
          <input
            type="radio"
            value={0}
            name=""
            id=""
            class="block mx-auto scale-150"
            bind:group={nilai[n]}
          />
        </td>
      </tr>
    {/each}
  </tbody>
</table>
<div class="flex justify-between sticky bottom-0 bg-blue-100 p-2 items-center">
  <div class="">
    <button class="btn btn-success" onclick={mengacakAngka}>Acak</button>
  </div>
  <div class="text-xl font-bold">{nilaiTotal * 10}</div>
</div>
