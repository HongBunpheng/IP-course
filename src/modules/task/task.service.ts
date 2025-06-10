import { Injectable } from '@nestjs/common';
import { InjectRepository } from '@nestjs/typeorm';
import { Repository } from 'typeorm';
import { Task } from './task.entity';
import { CreateTaskDto } from './dto/create-task.dto';
import { NotFoundException } from '@nestjs/common';


@Injectable()
export class TaskService {
  constructor(
    @InjectRepository(Task)
    private taskRepo: Repository<Task>,
  ) {}

  async getTask(id: number) {
    const task = await this.taskRepo.findOne({ where: { id } });
    if (!task) {
      throw new NotFoundException(`Task with id ${id} not found`);
    }
    return task;
  }

  create(data: Partial<Task>) {
    const task = this.taskRepo.create(data);
    return this.taskRepo.save(task);
  }

  async updateTask(id: number, updateData: Partial<Task>) {
  const task = await this.taskRepo.findOne({ where: { id } });
  if (!task) {
    throw new NotFoundException(`Task with id ${id} not found`);
  }

  await this.taskRepo.update(id, updateData);
  return this.taskRepo.findOne({ where: { id } });
}

  async deleteTask(id: number) {
    const result = await this.taskRepo.delete(id);
    if (result.affected === 0) {
      throw new NotFoundException(`Task with id ${id} not found`);
    }
    return { message: `Task with id ${id} has been deleted` };
  }

  getAllTasks() {
    return this.taskRepo.find({ relations: ['user'] });
  }
}

