<template>
  <li class="todo-item">
    <label>
      <input
        type="checkbox"
        :checked="todo.completedAt"
        @change="toggleStatus"
      />
      <span :class="{ done: todo.completedAt }">{{ todo.name }}</span>
    </label>
    <button class="delete-btn" @click="deleteTask">🗑</button>
  </li>
</template>

<script setup>
import { useTodoStore } from '../stores/todo'

const props = defineProps({
  todo: Object
})

const store = useTodoStore()

function toggleStatus() {
  store.toggleStatus(props.todo.id)
}

function deleteTask() {
  store.deleteTodo(props.todo.id)
}
</script>

<style scoped>
.todo-item {
  display: flex;
  align-items: center;
  justify-content: space-between;
  background: #f2f2f2;
  padding: 10px;
  border-radius: 8px;
  margin-bottom: 10px;
}

input[type='checkbox'] {
  margin-right: 10px;
}

.done {
  text-decoration: line-through;
  color: #888;
}

.delete-btn {
  background: none;
  border: none;
  cursor: pointer;
  font-size: 18px;
  color: #d9534f;
}
</style>
