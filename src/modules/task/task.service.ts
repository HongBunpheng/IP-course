import { Injectable } from '@nestjs/common';
import { InjectRepository } from '@nestjs/typeorm';
import { Repository } from 'typeorm';
import { Task } from './task.entity';

@Injectable()
export class TaskService {
  constructor(
    @InjectRepository(Task)
    private taskRepo: Repository<Task>,
  ) {}

    // ✅ Get one task by ID
  getTask(id: number) {
    return this.taskRepo.findOne({ where: { id }, relations: ['user'] });
  }

  // ✅ Create a task
  createTask(data: Partial<Task>) {
    const task = this.taskRepo.create(data);
    return this.taskRepo.save(task);
  }

  // ✅ Update a task by ID
  async updateTask(id: number, updateData: Partial<Task>) {
    await this.taskRepo.update(id, updateData);
    return this.getTask(id);
  }

  // ✅ Delete a task
  deleteTask(id: number) {
    return this.taskRepo.delete(id);
  }

  // ✅ Optional: Get all tasks
  getAllTasks() {
  return this.taskRepo.find({ relations: ['user'] }); // or just .find()
}
}
