<template>
  <q-page padding>
    <h1 class="text-h4">profile page</h1>
    <q-inner-loading v-if="!me" color="red-6" size="45px"/>
    <div v-if="me">
      <!-- <p>{{ me.profile.name }}</p> -->
      <p>{{ me.name }}</p>
    </div>
  </q-page>
</template>

<script setup>
import { api } from 'src/boot/axios'
import { onMounted, ref } from 'vue'

const me = ref(null)
onMounted(() => {
  fetchMe()
})

function fetchMe() {
  api
    .get('/api/profile')
    .then((r) => {
      me.value = r.data
      console.log(r.data)
    })
    .catch((e) => {
      console.log(e)
    })
}
</script>
