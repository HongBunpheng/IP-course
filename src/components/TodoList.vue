<template>
  <ul class="todoLists">
    <TodoItem
      v-for="todo in filteredTasks"
      :key="todo.id"
      icon="uil-adobe-alt"
      :todo="todo"
    />
  </ul>
</template>

<script setup>
import { computed, watch, onMounted } from 'vue'
import { useTodoStore } from '../stores/todo'
import TodoItem from './TodoItem.vue'

const props = defineProps({
  status: String,
})

const store = useTodoStore()

onMounted(() => {
  store.fetchTodos()
})

const filteredTasks = computed(() => {
  return props.status === 'completed'
    ? store.todos.filter(t => t.completedAt != null)
    : store.todos.filter(t => t.completedAt == null)
})

watch(() => store.todos, () => {
  console.log('✅ todos updated')
})
</script>
