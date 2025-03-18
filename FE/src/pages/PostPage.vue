<template>
  <q-page padding>
    <h1 class="text-h4">welcome to post page</h1>
    <q-btn label="Create New Posts" to="/createposts" color="red-9" />
    <table>
      <tr>
        <td>ID</td>
        <td>Title</td>
        <td>user_id</td>
        <td>update</td>
        <td>delete</td>
        <td>status</td>
      </tr>
      <tr>
        <q-inner-loading v-if="!post" color="red-9" size="45px" />
      </tr>
      <tr v-for="post in posts" :key="post.id">
        <td>{{ post.id }}</td>
        <td>{{ post.title }}</td>
        <td>{{ post.user_id }}</td>
        <td><q-btn label="Edit" color="yellow-8" /></td>
        <td><q-btn label="Delete" color="red-8" /></td>
        <td><q-btn label="Show" color="green-8" /></td>
      </tr>
    </table>
  </q-page>
</template>

<script setup>
import { api } from 'src/boot/axios'
import { onMounted, ref } from 'vue'

const posts = ref([])
onMounted(() => {
  allpost()
})
function allpost() {
  api
    .get('/api/post')
    .then((r) => {
      console.log(r.data)
      posts.value = r.data
    })
    .catch((e) => {
      console.log(e)
    })
}
</script>
