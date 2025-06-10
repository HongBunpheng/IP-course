import { Injectable, NotFoundException } from '@nestjs/common';
import { InjectRepository } from '@nestjs/typeorm';
import { Repository } from 'typeorm';
import { User } from './user.entity';
import { CreateUserDto } from './dto/create-user.dto';

@Injectable()
export class UserService {
  constructor(
    @InjectRepository(User)
    private usersRepo: Repository<User>,
  ) {}

  // 🔍 Get all users (with their tasks)
  findAll() {
    return this.usersRepo.find({ relations: ['tasks'] });
  }

  // 🔍 Get user by ID
  async getUser(id: number) {
    const user = await this.usersRepo.findOne({
      where: { id },
      relations: ['tasks'],
    });

    if (!user) {
      throw new NotFoundException(`User with ID ${id} not found`);
    }

    return user;
  }

  // ➕ Create a new user
  async create(createUserDto: CreateUserDto) {
    const user = this.usersRepo.create(createUserDto);
    return this.usersRepo.save(user);
  }

  // ✏️ Update user by ID
  async update(id: number, update: Partial<User>) {
    const user = await this.usersRepo.findOne({ where: { id } });

    if (!user) {
      throw new NotFoundException(`User with ID ${id} not found`);
    }

    await this.usersRepo.update(id, update);
    return this.getUser(id);
  }

  // 🗑️ Delete user by ID
  async delete(id: number) {
    const user = await this.usersRepo.findOne({ where: { id } });

    if (!user) {
      throw new NotFoundException(`User with ID ${id} not found`);
    }

    return this.usersRepo.delete(id);
  }
}
