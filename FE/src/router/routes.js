const routes = [
  {
    path: '/',
    component: () => import('layouts/MyLayout.vue'),
    children: [
      { path: '', component: () => import('pages/IndexPage.vue') },
      { path: 'register', component: () => import('pages/RegisterPage.vue') },
      { path: 'Login', component: () => import('pages/LoginPage.vue') },
      { path: 'post', component: () => import('pages/PostPage.vue') },
      { path: 'profile', component: () => import('pages/ProfilePage.vue') },
    ],
  },

  // Always leave this as last one,
  // but you can also remove it
  {
    path: '/:catchAll(.*)*',
    component: () => import('pages/ErrorNotFound.vue'),
  },
]

export default routes
