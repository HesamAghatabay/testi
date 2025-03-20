<template>
  <q-page padding>
    <h1 class="text-h4">Show Post Page</h1>
    <q-inner-loading :showing="loading" size="75px" color="green-8" />
    <div v-if="post">
      <p>{{ post.id }}</p>
      <p>{{ post?.id || 'شناسه در دسترس نیست' }}</p>
      <p>{{ post.title }}</p>
    </div>
  </q-page>
</template>

<script setup>
import { api } from 'src/boot/axios'
import { onMounted, ref } from 'vue'
import { useRoute } from 'vue-router'

const route = useRoute()
const post = ref(null)
const postId = route.params.id
const loading = ref(false)

onMounted(() => {
  loading.value = true
  api
    .get(`/api/post/${postId}`)
    .then((r) => {
      console.log(r.data)
      post.value = r.data
    })
    .catch((e) => {
      console.log(e)
    }).finally(()=>{
      loading.value = false
    })
})
</script>
