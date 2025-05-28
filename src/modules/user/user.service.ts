import { Injectable } from '@nestjs/common'
import { InjectRepository } from '@nestjs/typeorm'
import { Repository } from 'typeorm'
import { User } from './user.entity'

@Injectable()
export class UserService {
  constructor(
    @InjectRepository(User)
    private usersRepo: Repository<User>,
  ) {}

  findAll() {
    return this.usersRepo.find({ relations: ['tasks'] })
  }

  getUser(username: string) {
    return this.usersRepo.findOne({
      where: { username },
      relations: ['tasks'],
    })
  }

  createUser(data: Partial<User>) {
    const user = this.usersRepo.create(data)
    return this.usersRepo.save(user)
  }

  updateUser(username: string, update: Partial<User>) {
    return this.usersRepo.update({ username }, update)
  }

  deleteUser(username: string) {
    return this.usersRepo.delete({ username })
  }
}
