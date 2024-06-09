**Tobacco** **Nexus** **Website**

**Problem** **Definition**

The Tobacco Nexus website aims to function as an intermediary platform
connecting tobacco product vendors with potential customers. The primary
objective is to introduce and showcase the products registered on the
website by various sellers. Unlike traditional e-commerce platforms,
Tobacco Nexus does not handle the shipment of products but facilitates
the ordering process by notifying sellers of customer purchases.

**Purpose** **and** **Benefits**

> ● **For** **Customers**: The platform provides a convenient way to
> explore and purchase a wide range of tobacco products from various
> sellers in one place.
>
> ● **For** **Sellers**: It offers sellers an additional channel to
> reach potential customers and increase their sales without managing a
> full-fledged online store.
>
> ● **For** **Tobacco** **Nexus**: The website acts as a facilitator,
> earning revenue possibly through listing fees, commissions on sales,
> or advertising, without handling the logistics of product shipment.

**Challenges** **and** **Considerations**

> ● **Compliance**: Ensuring all listed products and transactions comply
> with local and international tobacco regulations.
>
> ● **User** **Experience**: Providing a seamless and secure browsing
> and purchasing experience for customers.
>
> ● **Seller** **Verification**: Implementing a robust verification
> process to ensure the credibility of sellers.
>
> ● **Notification** **System**: Ensuring timely and reliable
> notification systems for order alerts to sellers.
>
> ● **Data** **Privacy**: Maintaining stringent security measures to
> protect the confidentiality of both customers and sellers.

**Motivation** **and** **Business** **Model**

> ● **Low** **Investment**: As a businessman, the choice to develop this
> platform stems from the desire to create a low-investment yet highly
> functional website. By not handling the shipment process, significant
> costs associated with warehousing and logistics are avoided.
>
> ● **Scalable** **Solution**: This model provides a budget-friendly
> approach while still offering substantial growth potential as the
> platform scales with more sellers and customers joining.

**Methodology**

**Research** **and** **Planning**

Our initial phase focused on thorough research to identify a platform
that could effectively integrate our database with a frontend website
and provide the necessary facilities for our project. We evaluated
various frameworks based on their features, efficiency, ease of problem
handling, and community support. After extensive research, we chose
Laravel as our framework due to several advantages:

> ● **Advantages** **of** **Laravel**:
>
> ○ **Simplicity** **and** **Elegance**: Laravel offers an elegant
> syntax and a streamlined development process, making it easier to
> write clean and maintainable code.
>
> ○ **Comprehensive** **Documentation**: Laravel’s extensive and clear
> documentation facilitates quicker learning and implementation.
>
> ○ **Built-in** **Tools** **and** **Features**: Laravel provides
> built-in tools like Blade templating engine, and an intuitive routing
> system that simplifies development.
>
> **○** **SQL** **handling:** laravel provides a great platform to use
> SQL queries in combination with other programming languages PHP,HTMl
>
> ○ **Security**: Laravel includes robust security features such as CSRF
> protection, password hashing, and SQL injection prevention.
>
> ○ **Community** **Support**: A large and active community ensures
> continuous improvement and a wealth of resources for troubleshooting
> and enhancement.

**Framework** **Selection** **and** **Initial** **Setup**

Having established Laravel as our framework of choice, we began by
setting up the basic structure of our project. This involved creating
fundamental views and controllers that act as intermediaries between the
views and the database.

> 1\. **Basic** **Views** **Creation**:
>
> ○ We designed basic views, starting with essential pages like login,
> registration, product listings, and dashboard interfaces.
>
> ○ Each view was structured with user experience in mind, ensuring that
> key elements such as forms, buttons, and navigation menus were
> included for usability and accessibility.
>
> 2\. **Controller** **Development**:
>
> ○ Controllers were developed concurrently with views to manage the
> logic behind user interactions and data handling.
>
> ○ Each controller functioned as a mediator between the frontend
> (views) and the backend (database), processing user inputs, querying
> the database, and returning the appropriate responses.

**Structuring** **the** **Project**

With the basic framework in place, we laid out a detailed structure for
each view and its corresponding functionality.

**Building** **on** **the** **Basic** **Structure**

Once the foundational structure was established, we incrementally
enhanced the project by adding more features and refining existing ones.

**Continuous** **Improvement**

Throughout the development process, we continuously sought feedback and
made improvements to enhance the functionality and user experience of
the Tobacco Nexus website. Our agile approach allowed us to adapt to
changes and incorporate new features based on user needs and market
trends.

**TOOLKIT**

**Development** **Framework:**

> **●** **Laravel:** A PHP framework used for developing the backend of
> the application, managing routing, and handling database operations.

**Database** **Management:**

> **●** **MySQL:** A relational database management system used for
> storing and managing application data.

**Programming** **Languages:**

> **●** **PHP:** The primary language for server-side scripting and
> backend development.
>
> **●** **HTML(blade** **template):** Used for structuring the content
> and layout of the webpages. **●** **CSS:** Used for styling the
> webpages, ensuring a visually appealing and responsive
>
> design.
>
> **●** **JavaScript:** Used for adding interactivity and dynamic
> features to the frontend.

**Test** **Cases**

**Overview**

Testing is a critical part of the development process to ensure the
functionality, reliability, and security of the Tobacco Nexus website.
We conducted various test cases to cover different

aspects of the application, including user interactions, data
validation, security, and performance.

**Test** **Case** **Categories**

> 1\. **Authentication** **and** **Authorization** 2. **Product**
> **Management**
>
> 3\. **Order** **Management** **4.** **Blog** **Management**

**Detailed** **Test** **Cases**

**1.** **Authentication** **and** **Authorization**

> ● **Test** **Case** **1.1:** **User** **Registration**
>
> ○ **Description**: Verify that a new user can register with valid
> credentials.
>
> ○ **Steps**: Navigate to the registration page, enter valid details
> (name, email, password), and submit the form.
>
> ○ **Expected** **Result**: The user is registered successfully and
> redirected to the home page.
>
> ● **Test** **Case** **1.2:** **User** **Login**
>
> ○ **Description**: Verify that a registered user can log in with
> correct credentials.
>
> ○ **Steps**: Navigate to the login page, enter valid email and
> password, and submit the form.
>
> ○ **Expected** **Result**: The user is logged in successfully and
> redirected to the home page.
>
> ● **Test** **Case** **1.3:** **Incorrect** **Login**
>
> ○ **Description**: Verify that the system handles incorrect login
> attempts.
>
> ○ **Steps**: Enter incorrect email or password on the login page and
> submit the form. ○ **Expected** **Result**: The user is redirected to
> the login page.
>
> ● **Test** **Case** **1.4:** **Password** **Reset**
>
> ○ **Description**: Verify the password reset functionality.
>
> ○ **Steps**: Click on the "Edit profile" button, and enter the current
> password if it matches,you will be able to reset a new password.
>
> ○ **Expected** **Result**: User successfully sets a new password and
> is redirected to profile page.

**2.** **Product** **Management**

> ● **Test** **Case** **2.1:** **Add** **New** **Product**
>
> ○ **Description**: Verify that the seller successfully adds to his
> products.
>
> ○ **Steps**: Log in as a seller, navigate to the add product page,
> enter product details, and submit.
>
> ○ **Expected** **Result**: The product is added successfully and
> displayed in the product listings.
>
> ● **Test** **Case** **2.2:** **Edit** **Product**
>
> ○ **Description**: Verify that a seller can edit an existing product.
>
> ○ **Steps**: Log in as a seller, navigate to the product management
> page, select a product to edit, update details, and submit.
>
> ○ **Expected** **Result**: The product details are updated
> successfully.

**3.** **Order** **Management**

> ● **Test** **Case** **3.1:** **Place** **Order**
>
> ○ **Description**: Verify that a logged-in customer can place an
> order.
>
> ○ **Steps**: Log in as a customer, browse products, add a product to
> the cart, proceed to checkout, and confirm the order.
>
> ○ **Expected** **Result**: The order is placed successfully, and the
> seller is notified. ● **Test** **Case** **3.2:** **Order** **status**
> **updated**
>
> ○ **Description**: Verify that a seller can update the status of order
> from in place to dispatched to delivered.
>
> ○ **Steps**: Log in as the seller, navigate to the order management
> page, select an order to update status.
>
> ○ **Expected** **Result**: The order status is updated and the
> customer is notified.

**4.** **Blog** **Management**

> ● **Test** **Case** **4.1:** **Add** **New** **Blog** **Post**
>
> ○ **Description**: Verify that a writer can add a new blog post.
>
> ○ **Steps**: Log in as a writer, navigate to the add blog post page,
> enter blog details (title, content, tags), and submit.
>
> ○ **Expected** **Result**: The blog post is added successfully and
> displayed in the blog listings.
>
> ● **Test** **Case** **4.2:** **Edit** **Blog** **Post**
>
> ○ **Description**: Verify that a writer can edit an existing blog
> post.
>
> ○ **Steps**: Log in as a writer, navigate to the blog management page,
> select a blog post to edit, update details, and submit.
>
> ○ **Expected** **Result**: The blog post details are updated
> successfully. ● **Test** **Case** **4.3:** **View** **Blog** **Post**
>
> ○ **Description**: Verify that users and sellers can view a blog post.
> ○ **Steps**: Navigate to the blog page, click on a blog post title.
>
> ○ **Expected** **Result**: The full content of the blog post is
> displayed. ● **Test** **Case** **4.4:** **Review** **on** **Blog**
> **Post**
>
> ○ **Description**: Verify that logged-in users can comment on a blog
> post.
>
> ○ **Steps**: Log in as a user, navigate to a blog post, enter a
> comment in the comment section, and submit. If the same user gives
> more than one review the previous one will be overwritten and the
> latest one will be displayed.
>
> ○ **Expected** **Result**: The comment is added successfully and
> displayed under the blog post.

**Work** **Distribution**

**Meesum** **Abbas**

**Role:** Group Lead

> **●** **Responsibilities:**
>
> ○ Provided overall direction for the project. ○ Identified required
> functionalities.
>
> ○ Coordinated collaboration among team members.
>
> ○ Ensured the project stayed on track and met its goals.

**Waleed** **Abbas**

**Role:** Frontend Developer

> **●** **Responsibilities:**
>
> ○ Developed the entire frontend of the website. ○ Created views and
> user interfaces.
>
> ○ Worked closely with the controller to integrate the frontend with
> the backend functionalities.

**Sobia** **Rizwan**

**Role:** Controller Developer

> **●** **Responsibilities:**
>
> ○ Developed controllers as directed by Meesum. ○ Added functions and
> features to the controllers.
>
> ○ Ensured controllers acted as intermediaries between views and the
> database.
>
> ○ Worked closely with the frontend and backend developers to ensure
> smooth data flow and functionality.

**Anas** **Aslam**

**Role:** Database Developer

> **●** **Responsibilities:**
>
> ○ Provided SQL queries as required.
>
> ○ Worked under Sobia’s direction to understand where queries were
> needed.
>
> ○ Referred to the Entity Relationship Diagram (ERD) to ensure accurate
> database interactions.
>
> ○ Ensured the database was optimized and efficient for the
> application’s needs.

**Conclusion**

This distribution of tasks ensured that each team member specialized in
a critical area of the project, contributing to a well-rounded and
efficiently developed application. The collaborative approach
facilitated a seamless integration of the frontend, backend, and
database components, resulting in a functional and user-friendly Tobacco
Nexus website.
