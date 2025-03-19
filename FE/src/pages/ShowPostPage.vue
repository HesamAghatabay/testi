<template>
  <q-page padding>
    <h1 class="text-h4">Show Post Page</h1>
    <q-inner-loading color="red-8" />
    <p>{{ post.id }}</p>
    <p>{{ post.title }}</p>
  </q-page>
</template>

<script setup>
import { api } from 'src/boot/axios'
import { onMounted, ref } from 'vue'
import { useRoute } from 'vue-router'

const route = useRoute()
const post = ref(null)
const postId = route.params.id

onMounted(() => {
  api
    .get(`/api/post/${postId}`)
    .then((r) => {
      post.value = r.data
    })
    .catch((e) => {
      console.log(e)
    })
})
</script>
