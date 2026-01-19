provider "aws" {
  region = "us-east-1"
}

# Grupo de seguridad
resource "aws_security_group" "web_sg" {
  name        = "ra1-ra2-web-sg"
  description = "Allow SSH, HTTP and HTTPS"

  ingress {
    description = "SSH"
    from_port   = 22
    to_port     = 22
    protocol    = "tcp"
    cidr_blocks = ["0.0.0.0/0"]
  }

  ingress {
    description = "HTTP"
    from_port   = 80
    to_port     = 80
    protocol    = "tcp"
    cidr_blocks = ["0.0.0.0/0"]
  }

  ingress {
    description = "HTTPS"
    from_port   = 443
    to_port     = 443
    protocol    = "tcp"
    cidr_blocks = ["0.0.0.0/0"]
  }

  egress {
    description = "All outbound"
    from_port   = 0
    to_port     = 0
    protocol    = "-1"
    cidr_blocks = ["0.0.0.0/0"]
  }

  tags = {
    Name = "examen-SG"
  }
}

# INSTANCIA EC2
resource "aws_instance" "symfony" {
  ami           = "ami-0c02fb55956c7d316" # Amazon Linux 2
  instance_type = "t2.micro"
  key_name      = "examen"

  vpc_security_group_ids = [aws_security_group.web_sg.id]

  user_data = <<-EOF
                #!/bin/bash
                yum update -y
                yum install -y git
                amazon-linux-extras install docker -y
                systemctl start docker
                systemctl enable docker
                usermod -a -G docker ec2-user

                curl -L https://github.com/docker/compose/releases/latest/download/docker-compose-$(uname -s)-$(uname -m) \
                -o /usr/local/bin/docker-compose
                chmod +x /usr/local/bin/docker-compose
                EOF

  tags = {
    Name = "Examen-Symfony"
  }
}

# IP ELASTICA
resource "aws_eip" "static_ip" {
  instance = aws_instance.symfony.id
}
