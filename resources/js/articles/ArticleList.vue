<template>
  <div class="container mt-2">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="card shadow-lg border-0">
          <div class="card-header bg-primary text-white">
            <h3 class="mb-0">📰 Latest Articles</h3>
          </div>
          <div class="card-body bg-light">
            <ul v-if="articles.length" class="list-group list-group-flush">
              <li v-for="article in articles" :key="article.id" class="list-group-item d-flex flex-column align-items-start">
                <small class="text-muted mb-1">{{ article.created_at }}</small>
                <a :href="`/article/${article.id}`" class="h5 text-decoration-none text-primary">
                  {{ article.title }}
                </a>
                <span class="text-secondary">👁️ Views: {{ article.view_count }}</span>
              </li>
            </ul>
            <p v-else class="text-center text-muted mt-3">No articles available.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'ArticleList',

  props: {
    articles: {
      type: Array,
      default: () => []
    }
  },

  created() {
    console.log('ArticleList component created');
    console.log('Articles:', this.articles);
  },
}
</script>

<style scoped>
.card {
  background-color: #ffffff;
  border-radius: 12px;
}

.card-header {
  border-bottom: 1px solid #dee2e6;
}

.list-group-item {
  background-color: #f9f9f9;
  border: none;
}

a:hover {
  text-decoration: underline;
}
</style>
