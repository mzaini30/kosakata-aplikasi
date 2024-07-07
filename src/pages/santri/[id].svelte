<script>
  export let params = {};
  import santri from "../../santri.json";
  import kosakata from "../../kosakata.json";
  let terpilih = santri.filter((x) => x.id == params.id)[0];
</script>

<div class="container py-4 space-y-4 text-center">
  <div class="list-group">
    <div class="list-group-item uppercase active">{terpilih.nama}</div>
  </div>
  <div class="list-group">
    <div class="list-group-item uppercase active">Mufrodat Dzuhur</div>
    {#each terpilih.mufrodatDzuhur as d}
      <div class="list-group-item">
        <img src="gambar/{d}.PNG" />
      </div>
      <div class="list-group-item">
        {kosakata[d - 1]}
      </div>
    {/each}
  </div>
  <div class="list-group">
    <div class="list-group-item uppercase active">Mufrodat Ahad Pagi</div>
    {#each terpilih.mufrodatAhadPagi as d}
      <div class="list-group-item">
        <img src="gambar/{d}.PNG" />
      </div>
      <div class="list-group-item">
        {kosakata[d - 1]}
      </div>
    {/each}
  </div>
  <div class="list-group">
    <div class="list-group-item uppercase active">Iqob</div>
    {#each terpilih.iqob as d}
      <div class="list-group-item">
        <img src="gambar/{d}.PNG" />
      </div>
      <div class="list-group-item">
        {kosakata[d - 1]}
      </div>
    {/each}
  </div>
</div>
