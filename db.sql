use library;
insert into users(name, username, type, email, address, phone, password, status, created_at, updated_at)
values('admin', 'admin', 'admin', 'admin@email.co', 'I live here', 01234567890, '$2y$10$OmMw4gRj2Knkz4Kg5Jx92.CTUFQu9EKvkPcQZMf6BOXHIZKNplzgW', 0, CURRENT_TIME(), CURRENT_TIME());
insert into users(name, username, email, address, phone, password, status, created_at, updated_at)
values('mohamed', 'ali', 'mohamed@email.co', 'I live here', 01234567890, '$2y$10$OmMw4gRj2Knkz4Kg5Jx92.CTUFQu9EKvkPcQZMf6BOXHIZKNplzgW', 0, CURRENT_TIME(), CURRENT_TIME());

insert into categories (name, description, created_at, updated_at) values('horror', 'Horror Books', CURRENT_TIME(), CURRENT_TIME());
insert into categories (name, description, created_at, updated_at) values('comedy', 'comedy Books', CURRENT_TIME(), CURRENT_TIME());
insert into categories (name, description, created_at, updated_at) values('thriller', 'thriller Books', CURRENT_TIME(), CURRENT_TIME());

insert into books (title, author, category_id, rate, price, summary, page_count, no_copies, created_at, updated_at)
values('funny book', 'funny author', 2, 3, 30, 'funny stuff', 250, 4, CURRENT_TIME(), CURRENT_TIME());
insert into books (title, author, category_id, rate, price, summary, page_count, no_copies, created_at, updated_at)
values('funny book1', 'funny author', 2, 3, 60, 'funny stuff', 250, 4, CURRENT_TIME(), CURRENT_TIME());
insert into books (title, author, category_id, rate, price, summary, page_count, no_copies, created_at, updated_at)
values('funny book2', 'funny author', 2, 3, 40, 'funny stuff', 250, 4, CURRENT_TIME(), CURRENT_TIME());
insert into books (title, author, category_id, rate, price, summary, page_count, no_copies, created_at, updated_at)
values('funny book3', 'funny author', 2, 3, 10, 'funny stuff', 250, 4, CURRENT_TIME(), CURRENT_TIME());
insert into books (title, author, category_id, rate, price, summary, page_count, no_copies, created_at, updated_at)
values('funny book4', 'funny author', 2, 3, 20, 'funny stuff', 250, 4, CURRENT_TIME(), CURRENT_TIME());
insert into books (title, author, category_id, rate, price, summary, page_count, no_copies, created_at, updated_at)
values('funny book5', 'funny author', 2, 3, 100, 'funny stuff', 250, 4, CURRENT_TIME(), CURRENT_TIME());
insert into books (title, author, category_id, rate, price, summary, page_count, no_copies, created_at, updated_at)
values('funny book6', 'funny author', 2, 3, 160, 'funny stuff', 250, 4, CURRENT_TIME(), CURRENT_TIME());

insert into books (title, author, category_id, rate, price, summary, page_count, no_copies, created_at, updated_at)
values('horror book', 'horror author', 1, 3, 30, 'horror stuff', 250, 4, CURRENT_TIME(), CURRENT_TIME());
insert into books (title, author, category_id, rate, price, summary, page_count, no_copies, created_at, updated_at)
values('horror book1', 'horror author', 1, 3, 60, 'horror stuff', 250, 4, CURRENT_TIME(), CURRENT_TIME());
insert into books (title, author, category_id, rate, price, summary, page_count, no_copies, created_at, updated_at)
values('horror book2', 'horror author', 1, 3, 40, 'horror stuff', 250, 4, CURRENT_TIME(), CURRENT_TIME());
insert into books (title, author, category_id, rate, price, summary, page_count, no_copies, created_at, updated_at)
values('horror book3', 'horror author', 1, 3, 10, 'horror stuff', 250, 4, CURRENT_TIME(), CURRENT_TIME());
insert into books (title, author, category_id, rate, price, summary, page_count, no_copies, created_at, updated_at)
values('horror book4', 'horror author', 1, 3, 20, 'horror stuff', 250, 4, CURRENT_TIME(), CURRENT_TIME());
insert into books (title, author, category_id, rate, price, summary, page_count, no_copies, created_at, updated_at)
values('horror book5', 'horror author', 1, 3, 100, 'horror stuff', 250, 4, CURRENT_TIME(), CURRENT_TIME());
insert into books (title, author, category_id, rate, price, summary, page_count, no_copies, created_at, updated_at)
values('horror book6', 'horror author', 1, 3, 160, 'horror stuff', 250, 4, CURRENT_TIME(), CURRENT_TIME());

insert into favorites(user_id, book_id, created_at, updated_at)
values(2, 1, CURRENT_TIME(), CURRENT_TIME());
insert into favorites(user_id, book_id, created_at, updated_at)
values(2, 6, CURRENT_TIME(), CURRENT_TIME());
insert into favorites(user_id, book_id, created_at, updated_at)
values(2, 5, CURRENT_TIME(), CURRENT_TIME());
insert into favorites(user_id, book_id, created_at, updated_at)
values(2, 3, CURRENT_TIME(), CURRENT_TIME());

insert into leases(user_id, book_id, duration, created_at, updated_at)
values(2, 1, 3,CURRENT_TIME(), CURRENT_TIME());
insert into leases(user_id, book_id, duration, created_at, updated_at)
values(2, 4, 6,CURRENT_TIME(), CURRENT_TIME());
insert into leases(user_id, book_id, duration, created_at, updated_at)
values(2, 2, 9,CURRENT_TIME(), CURRENT_TIME());
insert into leases(user_id, book_id, duration, created_at, updated_at)
values(2, 3, 2,CURRENT_TIME(), CURRENT_TIME());
