<template>
  <div class="add-todo">
    <input
      v-model="newTodo"
      placeholder="Enter your new todo"
      @keyup.enter="submitTodo"
    />
    <button @click="submitTodo" class="add-button">
      <i class="uil uil-schedule"></i>
    </button>
  </div>
</template>

<script setup>
import { ref } from 'vue'

const emit = defineEmits(['added'])
const newTodo = ref('')

function submitTodo() {
  const trimmed = newTodo.value.trim()
  if (!trimmed) return

  emit('added', {
    name: trimmed,
    description: '',
    completedAt: null,
  })

  newTodo.value = ''
}
</script>

<style scoped>
.add-todo {
  display: flex;
  align-items: center;
  gap: 8px;
  padding: 12px;
  background-color: white;
  border-radius: 8px;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
}

.add-todo input {
  flex: 1;
  padding: 8px 12px;
  border: 1px solid #ddd;
  border-radius: 6px;
  font-size: 16px;
}

.add-button {
  background-color: #007bff;
  color: white;
  border: none;
  padding: 8px 14px;
  border-radius: 6px;
  cursor: pointer;
  font-size: 16px;
}

.add-button i {
  font-size: 18px;
}
</style>
