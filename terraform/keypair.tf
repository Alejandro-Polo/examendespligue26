resource "aws_key_pair" "ra1_key" {
  key_name   = "examen"
  public_key = file("${path.module}/examen.pub")
}
