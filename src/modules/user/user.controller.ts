import {
  Get,
  Param,
  Controller,
  Post,
  Body,
  Patch,
  Delete,
  UsePipes,
  ValidationPipe,
} from '@nestjs/common';
import { UserService } from './user.service';
import { CreateUserDto } from './dto/create-user.dto';

@Controller('users')
export class UsersController {
  constructor(private readonly userService: UserService) {}

  // ✅ GET all users
  @Get()
  getAllUsers() {
    return this.userService.findAll();
  }

  // ✅ GET user by ID
  @Get('/:id')
  getUser(@Param('id') id: string) {
    return this.userService.getUser(+id); // cast to number
  }

  // ✅ CREATE user with DTO validation
  @Post()
  @UsePipes(new ValidationPipe({ whitelist: true }))
  createUser(@Body() createUserDto: CreateUserDto) {
    return this.userService.create(createUserDto);
  }

  // ✅ UPDATE user by ID
  @Patch('/:id')
  updateUser(
    @Param('id') id: string,
    @Body() body: { email?: string; password?: string },
  ) {
    return this.userService.update(+id, body); // cast to number
  }

  // ✅ DELETE user by ID
  @Delete('/:id')
  deleteUser(@Param('id') id: string) {
    return this.userService.delete(+id); // cast to number
  }
}
