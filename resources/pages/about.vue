<template>
  <main class="mt-5">
    <div class="text-center">
      <div class="duration-300">
        <h2 class="text-4xl"><i class="bi bi-info-circle-fill"></i></h2>
        <h3 class="text-3xl font-bold mb-5">About </h3>
      </div>
      <Transition name="scale" appear>
        <div v-if="isFetching" class="my-5">
          <i class="text-5xl bi bi-fan block spin"></i>
          <p>Please wait...</p>
        </div>
        <div v-else>
          <p>This is a simple fetching example using <code class="bg-dark-500 bg-opacity-50 p-1">axios</code></p>
          <table v-if="typeof fetchedData === 'object'" class="w-max mx-auto my-5 children:(border-b border-slate-600 last:!border-none)">
            <tr v-for="(item, i) in fetchedData" :key="i">
              <td class="p-2">{{ item.name }}</td>
              <td class="p-2">{{ item.version }}</td>
            </tr>
            <tr class="border-none">
              <td colspan="2" class="text-center">
                <button class="px-3 py-2 bg-primary-500 mt-5 rounded" @click="fetching">Refresh</button>
              </td>
            </tr>
          </table>
          <p v-else class="my-3 text-red-500 font-bold">
              {{ fetchedData }}
          </p>
        </div>
      </Transition>
    </div>
  </main>
</template>

<script>
import axios from 'axios'
export default {
  data() {
    return {
      isFetching: false,
      fetchedData: {}
    }
  },
  mounted() {
    this.fetching()
  },
  methods: {
    fetching(){
      this.isFetching = true
      this.$axios.get('info').then((res) => {
        console.log(res);
        this.fetchedData = res.data
      }).catch(error => {
        console.log(error);
        this.fetchedData = "Error, !"
      }).finally(() => {
        this.isFetching = false
      });
    }
  },
}
</script>