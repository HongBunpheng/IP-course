import axios from "axios";
import { defineStore } from "pinia";

const baseURL = "http://localhost:3100";

export const useTodoStore = defineStore("todo", {
  state: () => ({
    todos: [],
  }),

  getters: {
    pendingTodos: (state) => state.todos.filter((t) => t.completedAt == null),
    completedTodos: (state) => state.todos.filter((t) => t.completedAt != null),
    countTodos: (state) =>
      state.todos.filter((t) => t.completedAt == null).length,
  },

  actions: {
    async fetchTodos() {
      try {
        const res = await axios.get(`${baseURL}/tasks`);
        this.todos = res.data;
      } catch (err) {
        console.error("❌ fetchTodos failed:", err);
      }
    },

    async addTodo(todo) {
      try {
        await axios.post(`${baseURL}/tasks`, todo);
        await this.fetchTodos();
      } catch (err) {
        console.error("❌ addTodo failed:", err);
      }
    },

    async markDone(id) {
      try {
        await axios.patch(`${baseURL}/tasks/${id}/done`, {
          completedAt: new Date(),
        });
        await this.fetchTodos();
      } catch (err) {
        console.error("❌ markDone failed:", err);
      }
    },

    async markPending(id) {
      try {
        await axios.patch(`${baseURL}/tasks/${id}/pending`, {
          completedAt: null,
        });
        await this.fetchTodos();
      } catch (err) {
        console.error("❌ markPending failed:", err);
      }
    },

    toggleStatus(id) {
      const task = this.todos.find((t) => t.id === id);
      if (!task) return;

      const updated = {
        ...task,
        completedAt: task.completedAt ? null : new Date(),
      };

      const endpoint = `${baseURL}/tasks/${id}/${
        updated.completedAt ? "done" : "pending"
      }`;

      return axios
        .patch(endpoint, updated)
        .then(() => this.fetchTodos())
        .catch((err) => console.error("❌ toggleStatus failed:", err));
    },

    async deleteTodo(id) {
      try {
        await axios.delete(`${baseURL}/tasks/${id}`);
        await this.fetchTodos();
      } catch (err) {
        console.error("❌ deleteTodo failed:", err);
      }
    },
    async clearAll() {
      try {
        const deletions = this.todos
          .filter((task) => task.completedAt != null)
          .map((task) => axios.delete(`${baseURL}/tasks/${task.id}`));

        await Promise.all(deletions);
        await this.fetchTodos();
      } catch (err) {
        console.error("❌ clearAll failed:", err);
      }
    },
  },
});
