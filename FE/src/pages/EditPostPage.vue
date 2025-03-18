<template>
  <q-page padding>
    <h1 class="text-h4">Edit Post Page</h1>
    <div class="q-pa-xl">
      <q-input label="title" Rounded outlined type="text" v-model="title" />
      <q-input label="body" Rounded outlined type="text" v-model="body" />
      <q-input label="status" Rounded outlined type="text" v-model="status" />
      <q-input label="time" Rounded outlined type="time" v-model="time" />
      <q-btn class="q-ma-md" color="green-9" @click="editpost" label="Edit post" />
    </div>
  </q-page>
</template>

<script setup>
import { Notify } from 'quasar'
import { api } from 'src/boot/axios'
import { onMounted, ref } from 'vue'
import { useRoute, useRouter } from 'vue-router'

const router = useRouter()
const route = useRoute()
const title = ref('')
const body = ref('')
const status = ref('')
const time = ref('')

onMounted(() => {
  fetchPostDetails()
})

function fetchPostDetails() {
  const postId = route.params.id
  api
    .get(`/api/post/${postId}`)
    .then((r) => {
      const post = r.data
      console.log('API Response:', r.data)
      title.value = post.title
      body.value = post.body
      status.value = post.status
      time.value = post.time
    })
    .catch((e) => {
      console.log(e)
    })
}
function editpost() {
  const postId = route.params.id
  api
    .put(`/api/post/${postId}`, {
      title: title.value,
      body: body.value,
      status: status.value,
      time: time.value,
    })
    .then((r) => {
      console.log(r)
      Notify.create({
        type: 'positive',
        message: 'post edit',
      })
      router.push('/posts')
    })
    .catch((e) => {
      console.error('Error updating post:', e)
    })
}
</script>
